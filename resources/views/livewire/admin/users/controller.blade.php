<x-layout.page.main header="Users">
    <livewire:layouts.page.loading/>
    <livewire:layouts.page.sidebar/>
    <div class="flex flex-col flex-1 h-full overflow-hidden">
        <livewire:layouts.page.header/>
        <x-layout.page.content header="Users">
            {{--------------------CONTENT STARTS HERE--------------------}}
            <livewire:admin.users.datatable/>
            {{--------------------CONTENT ENDS HERE--------------------}}
        </x-layout.page.content>
        <livewire:layouts.page.footer/>
    </div>
    <livewire:layouts.page.panel/>
</x-layout.page.main>
