<div class="flex flex-col bg-purple-main text-white w-64 min-h-screen p-4 space-y-6">
    <div class="text-center text-2xl font-bold mb-8">
        ADMINISTRADOR
    </div>

    <nav class="flex flex-col space-y-4">
        <a href="<?= BASE_URL ?>Admin" class="hover:bg-purple-dark p-2 rounded flex items-center gap-2">
            <i class="fa-solid fa-chart-line"></i> <span>Dashboard</span>
        </a>
        <a href="<?= BASE_URL ?>adminMascotas"  class="hover:bg-purple-dark p-2 rounded flex items-center gap-2">
            <i class="fa-solid fa-dog"></i> <span>Mascotas</span>
        </a>
        <a href="<?= BASE_URL ?>adminUsuario" class="hover:bg-purple-dark p-2 rounded flex items-center gap-2">
            <i class="fa-solid fa-users"></i> <span>Usuarios</span>
        </a>
   
        <a href="<?= BASE_URL ?>home" class="hover:bg-purple-dark p-2 rounded flex items-center gap-2 text-red-300">
            <i class="fa-solid fa-right-from-bracket"></i> <span>Salir</span>
        </a>
    </nav>
</div>