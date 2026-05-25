<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customers Data</title>
    
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900 antialiased font-sans">

    <div class="flex min-h-screen">
        
        <aside id="sidebar" class="w-64 bg-white border-r border-gray-200 flex flex-col min-h-screen transition-all duration-300 overflow-x-hidden">
            
            <div class="px-6 py-5 flex items-center justify-between sidebar-header transition-all duration-300">
                <div class="sidebar-logo-wrapper overflow-hidden transition-all duration-300 w-auto h-8 flex items-center">
                    <span class="font-black text-xl tracking-wider text-gray-900">ERP</span>
                </div>
                <button id="sidebar-toggle" class="text-gray-400 hover:text-gray-600 focus:outline-none shrink-0 cursor-pointer">
                    <span class="iconify" data-icon="material-symbols:grid-layout-side-outline" style="font-size: 26px;"></span>
                </button>
            </div>

            <nav class="flex-1 px-3 mt-4 space-y-1">
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200 text-gray-600 hover:bg-gray-50 hover:text-gray-900" title="Users">
                    <span class="iconify shrink-0" data-icon="ph:user-bold" style="font-size: 22px;"></span>
                    <span class="sidebar-label text-sm transition-opacity duration-200">Users</span>
                </a>

                <a href="{{ route('customers.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200 bg-gray-100 text-gray-900 font-semibold" title="Customers">
                    <span class="iconify shrink-0" data-icon="ic:baseline-people" style="font-size: 22px;"></span>
                    <span class="sidebar-label text-sm transition-opacity duration-200">Customers</span>
                </a>
                
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200 text-gray-600 hover:bg-gray-50 hover:text-gray-900" title="Services">
                    <span class="iconify shrink-0" data-icon="mdi:cube" style="font-size: 22px;"></span>
                    <span class="sidebar-label text-sm transition-opacity duration-200">Services</span>
                </a>
                
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200 text-gray-600 hover:bg-gray-50 hover:text-gray-900" title="Subscription">
                    <span class="iconify shrink-0" data-icon="material-symbols:note-rounded" style="font-size: 22px;"></span>
                    <span class="sidebar-label text-sm transition-opacity duration-200">Subscription</span>
                </a>
            </nav>

            <div class="p-3 border-t border-gray-100 mb-2">
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200 text-gray-500 hover:bg-red-50 hover:text-red-600 cursor-pointer" title="Sign Out">
                    <span class="iconify shrink-0 text-gray-400 group-hover:text-red-500" data-icon="solar:logout-3-linear" style="font-size: 22px;"></span>
                    <span class="sidebar-label text-sm transition-opacity duration-200">Sign Out</span>
                </a>
            </div>
        </aside>

        <main class="flex-1 bg-white flex flex-col">
            
            <div class="border-b border-gray-200/80 px-8 py-5 flex items-center justify-between">
                <h2 class="text-sm font-semibold text-gray-500 tracking-wide uppercase">Customers</h2>
            </div>

            <div class="p-8 flex-1 bg-slate-50/50">
                
                <div class="flex justify-end mb-6">
                    <button onclick="toggleModal('create', true)" class="inline-flex items-center gap-2 bg-gray-900 hover:bg-gray-800 text-white px-4 py-2.5 text-xs font-semibold rounded-xl shadow-xs transition-all cursor-pointer">
                        <span class="iconify" data-icon="material-symbols:add-rounded" style="font-size: 18px;"></span>
                        Add Data
                    </button>
                </div>

                <div class="border border-gray-200 bg-white rounded-2xl overflow-hidden shadow-xs">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50 text-xs font-bold text-gray-400 tracking-wider uppercase">
                                <th class="py-4 px-6">Customer ID</th>
                                <th class="py-4 px-6">Customer Name</th>
                                <th class="py-4 px-6">Email</th>
                                <th class="py-4 px-6">Address</th>
                                <th class="py-4 px-6">Status</th>
                                <th class="py-4 px-6 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                            <tr class="hover:bg-slate-50/50 transition-colors relative">
                                <td class="py-4 px-6 font-semibold text-gray-900">021423457</td>
                                <td class="py-4 px-6">Alice Johnson</td>
                                <td class="py-4 px-6 text-gray-500">alice@gmail.com</td>
                                <td class="py-4 px-6">Swan Street</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">Active</span>
                                </td>
                                <td class="py-4 px-6 text-right relative">
                                    <button onclick="toggleDropdown(event, 'dropdown-1')" class="text-gray-400 hover:text-gray-600 p-1 cursor-pointer inline-flex items-center justify-center">
                                        <span class="iconify" data-icon="tabler:dots" style="font-size: 20px;"></span>
                                    </button>
                                    
                                    <div id="dropdown-1" class="dropdown-menu hidden absolute right-6 mt-1 w-36 bg-white border border-gray-100 rounded-xl shadow-lg z-40 py-1.5 text-left">
                                        <button onclick="changeStatus('021423457', 'active')" class="w-full px-3.5 py-2 text-xs text-gray-700 hover:bg-slate-50 flex items-center gap-2 cursor-pointer font-medium">
                                            <span class="iconify text-gray-400" data-icon="material-symbols:key-outline" style="font-size: 15px;"></span> Active
                                        </button>
                                        <button onclick="changeStatus('021423457', 'inactive')" class="w-full px-3.5 py-2 text-xs text-gray-700 hover:bg-slate-50 flex items-center gap-2 cursor-pointer font-medium">
                                            <span class="iconify text-gray-400" data-icon="material-symbols:block-outline" style="font-size: 15px;"></span> Deactivate
                                        </button>
                                        <button onclick="openEditModal('021423457', 'Alice Johnson', 'alice@gmail.com', 'Swan Street', 'active')" class="w-full px-3.5 py-2 text-xs text-gray-700 hover:bg-slate-50 flex items-center gap-2 cursor-pointer font-medium">
                                            <span class="iconify text-gray-400" data-icon="lucide:edit-3" style="font-size: 14px;"></span> Edit
                                        </button>
                                        <div class="border-t border-gray-100 my-1"></div>
                                        <button onclick="openDeleteModal('021423457')" class="w-full px-3.5 py-2 text-xs text-red-600 hover:bg-red-50 flex items-center gap-2 cursor-pointer font-semibold">
                                            <span class="iconify text-red-400" data-icon="lucide:trash-2" style="font-size: 14px;"></span> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr class="hover:bg-slate-50/50 transition-colors relative">
                                <td class="py-4 px-6 font-semibold text-gray-900">021423458</td>
                                <td class="py-4 px-6">Bob Smith</td>
                                <td class="py-4 px-6 text-gray-500">bob@gmail.com</td>
                                <td class="py-4 px-6">Maple Avenue</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-50 text-red-600 border border-red-100">Inactive</span>
                                </td>
                                <td class="py-4 px-6 text-right relative">
                                    <button onclick="toggleDropdown(event, 'dropdown-2')" class="text-gray-400 hover:text-gray-600 p-1 cursor-pointer inline-flex items-center justify-center">
                                        <span class="iconify" data-icon="tabler:dots" style="font-size: 20px;"></span>
                                    </button>
                                    
                                    <div id="dropdown-2" class="dropdown-menu hidden absolute right-6 mt-1 w-36 bg-white border border-gray-100 rounded-xl shadow-lg z-40 py-1.5 text-left">
                                        <button onclick="changeStatus('021423458', 'active')" class="w-full px-3.5 py-2 text-xs text-gray-700 hover:bg-slate-50 flex items-center gap-2 cursor-pointer font-medium">
                                            <span class="iconify text-gray-400" data-icon="material-symbols:key-outline" style="font-size: 15px;"></span> Active
                                        </button>
                                        <button onclick="changeStatus('021423458', 'inactive')" class="w-full px-3.5 py-2 text-xs text-gray-700 hover:bg-slate-50 flex items-center gap-2 cursor-pointer font-medium">
                                            <span class="iconify text-gray-400" data-icon="material-symbols:block-outline" style="font-size: 15px;"></span> Deactivate
                                        </button>
                                        <button onclick="openEditModal('021423458', 'Bob Smith', 'bob@gmail.com', 'Maple Avenue', 'inactive')" class="w-full px-3.5 py-2 text-xs text-gray-700 hover:bg-slate-50 flex items-center gap-2 cursor-pointer font-medium">
                                            <span class="iconify text-gray-400" data-icon="lucide:edit-3" style="font-size: 14px;"></span> Edit
                                        </button>
                                        <div class="border-t border-gray-100 my-1"></div>
                                        <button onclick="openDeleteModal('021423458')" class="w-full px-3.5 py-2 text-xs text-red-600 hover:bg-red-50 flex items-center gap-2 cursor-pointer font-semibold">
                                            <span class="iconify text-red-400" data-icon="lucide:trash-2" style="font-size: 14px;"></span> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>

    @include('customers.create')
    @include('customers.edit')
    @include('customers.delete')

    <script>
        // 1. Logic JavaScript Asli Milik Bawaan Sidebar Kamu (Ditahan Agar Efek Tetap Berjalan)
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.getElementById('sidebar-toggle');
            const logoWrapper = sidebar.querySelector('.sidebar-logo-wrapper');
            const labels = sidebar.querySelectorAll('.sidebar-label');
            const header = sidebar.querySelector('.sidebar-header');

            toggle.addEventListener('click', () => {
                sidebar.classList.toggle('w-64');
                sidebar.classList.toggle('w-20');

                if(sidebar.classList.contains('w-20')) {
                    logoWrapper.style.width = '0px';
                    logoWrapper.style.opacity = '0';
                    header.classList.remove('justify-between');
                    header.classList.add('justify-center');
                    header.classList.remove('px-6');
                    header.classList.add('px-4');
                } else {
                    logoWrapper.style.width = 'auto';
                    logoWrapper.style.opacity = '1';
                    header.classList.remove('justify-center');
                    header.classList.add('justify-between');
                    header.classList.remove('px-4');
                    header.classList.add('px-6');
                }

                labels.forEach(label => {
                    label.classList.toggle('hidden');
                });
            });
        });

        // 2. Fungsi Umum Buka/Tutup Modal dengan Efek Smooth Transition
        function toggleModal(modalId, show) {
            const modal = document.getElementById(`modal-${modalId}`);
            if (!modal) return;
            const container = modal.querySelector('.transform');
            
            if (show) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    if(container) {
                        container.classList.remove('scale-95');
                        container.classList.add('scale-100');
                    }
                }, 20);
            } else {
                modal.classList.add('opacity-0');
                if(container) {
                    container.classList.remove('scale-100');
                    container.classList.add('scale-95');
                }
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 200);
            }
        }

        // 3. Fungsi Dropdown Menu Aksi (Titik Tiga)
        function toggleDropdown(event, id) {
            event.stopPropagation();
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if(menu.id !== id) menu.classList.add('hidden');
            });
            document.getElementById(id).classList.toggle('hidden');
        }

        // Close dropdown otomatis jika klik di luar area menu
        window.addEventListener('click', () => {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        });

        // 4. Fungsi Khusus membawa data baris ke dalam Modal Edit
        function openEditModal(id, name, email, address, status) {
            document.getElementById('edit_customer_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_address').value = address;
            document.getElementById('edit_status').value = status;
            toggleModal('edit', true);
        }

        // 5. Fungsi Khusus pemicu Modal Delete
        function openDeleteModal(id) {
            toggleModal('delete', true);
        }

        // 6. Fungsi Ubah Status Customer lewat Menu Dropdown Action
        function changeStatus(id, status) {
            alert(`Customer ID ${id} diubah statusnya menjadi: ${status.toUpperCase()}`);
        }
    </script>
</body>
</html>