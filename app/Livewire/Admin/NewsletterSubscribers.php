<?php

namespace App\Livewire\Admin;

use App\Models\Newsletter;
use Livewire\Component;
use Livewire\WithPagination;

class NewsletterSubscribers extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = 'all'; // all, active, inactive

    protected $queryString = ['search', 'statusFilter'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function toggleStatus($subscriberId)
    {
        $subscriber = Newsletter::find($subscriberId);
        
        if ($subscriber) {
            if ($subscriber->is_active) {
                $subscriber->unsubscribe('Desactivado por administrador');
            } else {
                $subscriber->resubscribe();
            }
            
            session()->flash('message', 'Estado actualizado correctamente.');
        }
    }

    public function deleteSubscriber($subscriberId)
    {
        Newsletter::find($subscriberId)?->delete();
        session()->flash('message', 'Suscriptor eliminado.');
    }

    public function getStats()
    {
        return [
            'total' => Newsletter::count(),
            'active' => Newsletter::active()->count(),
            'inactive' => Newsletter::inactive()->count(),
            'recent' => Newsletter::recent(30)->count(),
        ];
    }

    public function render()
    {
        $query = Newsletter::query();

        // Aplicar filtros
        if ($this->search) {
            $query->where('email', 'like', '%' . $this->search . '%');
        }

        if ($this->statusFilter === 'active') {
            $query->active();
        } elseif ($this->statusFilter === 'inactive') {
            $query->inactive();
        }

        $subscribers = $query->latest('subscribed_at')->paginate(20);
        $stats = $this->getStats();

        return view('livewire.admin.newsletter-subscribers', [
            'subscribers' => $subscribers,
            'stats' => $stats
        ]);
    }
}
