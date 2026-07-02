<?php

namespace App\Livewire;

use App\Models\Position;
use Livewire\Component;

class OrganizationManager extends Component
{
    public bool $showModal = false;

    public bool $isEditing = false;

    public ?int $editingId = null;

    public string $name = '';

    public string $role = '';

    public string $description = '';

    public ?int $parent_id = null;

    protected $rules = [
        'name' => 'required|string|max:255',
        'role' => 'required|string|max:255',
        'description' => 'nullable|string',
        'parent_id' => 'nullable|exists:positions,id',
    ];

    public function render()
    {
        $positions = Position::query()
            ->with(['children' => fn ($query) => $query->orderBy('name'), 'allChildren'])
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        $allPositions = Position::query()->orderBy('name')->get();

        return view('livewire.organization-manager', compact('positions', 'allPositions'));
    }

    public function openCreateModal(?int $parentId = null): void
    {
        $this->resetForm();
        $this->parent_id = $parentId;
        $this->showModal = true;
    }

    public function openEditModal(Position $position): void
    {
        $this->resetForm();
        $this->editingId = $position->id;
        $this->name = $position->name;
        $this->role = $position->role;
        $this->description = $position->description ?? '';
        $this->parent_id = $position->parent_id;
        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate();

        if ($this->isEditing && $this->editingId) {
            $position = Position::findOrFail($this->editingId);

            if ($this->parent_id === $position->id || $this->wouldCreateLoop($position->id, $this->parent_id)) {
                $this->addError('parent_id', 'Atasan tidak boleh menjadi diri sendiri atau salah satu anaknya.');

                return;
            }
        }

        Position::updateOrCreate(
            ['id' => $this->editingId],
            [
                'name' => trim($this->name),
                'role' => trim($this->role),
                'description' => trim($this->description),
                'parent_id' => $this->parent_id ?: null,
            ]
        );

        session()->flash('message', $this->isEditing ? 'Posisi berhasil diperbarui.' : 'Posisi berhasil ditambahkan.');

        $this->closeModal();
    }

    public function delete(Position $position): void
    {
        $position->children()->update(['parent_id' => null]);
        $position->delete();

        session()->flash('message', 'Posisi berhasil dihapus.');
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetForm();
    }

    protected function resetForm(): void
    {
        $this->editingId = null;
        $this->name = '';
        $this->role = '';
        $this->description = '';
        $this->parent_id = null;
        $this->isEditing = false;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    protected function wouldCreateLoop(int $positionId, ?int $parentId): bool
    {
        if ($parentId === null || $parentId === $positionId) {
            return true;
        }

        $current = Position::find($parentId);

        while ($current) {
            if ($current->id === $positionId) {
                return true;
            }

            $current = $current->parent;
        }

        return false;
    }
}
