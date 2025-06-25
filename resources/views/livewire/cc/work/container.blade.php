<div class="row g-6">
    @foreach($works as $work)
        @livewire('cc.work.item', ['work' => $work], key('work-'.$work->id))
    @endforeach
</div>
