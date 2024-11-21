<h3 class="text-sm font-semibold mb-6 text-black text-pretty dark:text-zinc-400">Main</h3>
<ul class="">
    <li>
        <a href="dashboard" class="flex items-center rounded hover:bg-gray-700 mb-6 text-balance text-black dark:text-white">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
    </li>
</ul>
<h3 class="text-sm font-semibold mb-6 text-black text-pretty dark:text-zinc-400">Program Kerja</h3>
<ul class="">
    <li>
        <a href="{{ route('prog-prioritas.index') }}" class="flex items-center rounded hover:bg-gray-700 mb-6 text-balance text-black dark:text-white">
            <i class="fas fa-tachometer-alt"></i> Prioritas
        </a>
    </li>

    <li>
        <a href="{{ route('prog-pokok.index') }}" class="flex items-center rounded hover:bg-gray-700 mb-6 text-balance text-black dark:text-white">
            <i class="fas fa-tachometer-alt"></i> Pokok
        </a>
    </li>

    <li>
        <a href="{{ route('prog-mitra.index') }}" class="flex items-center rounded hover:bg-gray-700 mb-6 text-balance text-black dark:text-white">
            <i class="fas fa-tachometer-alt"></i> Mitra
        </a>
    </li>
    
</ul>
<h3 class="text-sm font-semibold mb-6 text-black text-pretty dark:text-zinc-400">Transaksi</h3>
<ul class="">
    <li>
        <a href="{{ route('prog-transaksi.create') }}" class="flex items-center rounded hover:bg-gray-700 mb-6 text-balance text-black dark:text-white">
            <i class="fas fa-tachometer-alt"></i>Buat
        </a>
    </li>

    <li>
        <a href="{{ route('prog-transaksi.index') }}" class="flex items-center rounded hover:bg-gray-700 mb-6 text-balance text-black dark:text-white">
            <i class="fas fa-tachometer-alt"></i>Data
        </a>
    </li>

    
</ul>
