<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERP - Customers Data</title>
    
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F9FAFB] text-slate-900 antialiased font-sans">

    <div class="flex min-h-screen">
        
        <aside id="sidebar" class="w-64 bg-white border-r border-gray-200 flex flex-col min-h-screen transition-all duration-300 shrink-0">
            <div class="px-6 py-5 flex items-center justify-between border-b border-gray-100">
                <div class="sidebar-logo-wrapper flex items-center gap-3 overflow-hidden transition-all duration-300">
                    <div class="w-8 h-8 bg-black rounded-lg flex items-center justify-center text-white font-black text-sm tracking-tighter">E</div>
                    <span class="font-bold text-lg tracking-tight text-gray-900 sidebar-label">ERP</span>
                </div>
                <button id="sidebar-toggle" class="text-gray-400 hover:text-gray-600 focus:outline-none cursor-pointer">
                    <span class="iconify" data-icon="fluent:sidebar-left-24-regular" style="font-size: 22px;"></span>
                </button>
            </div>

            <nav class="flex-1 px-3 mt-6 space-y-1">
                <div class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-gray-400 opacity-50 cursor-not-allowed pointer-events-none select-none" title="Users (Disabled)">
                    <span class="iconify text-gray-400" data-icon="solar:user-linear" style="font-size: 20px;"></span>
                    <span class="sidebar-label text-sm font-medium transition-opacity duration-200">Users</span>
                </div>

                <a href="{{ route('customers.index') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('customers.index') ? 'bg-gray-50 text-gray-900 font-semibold' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}" title="Customers">
                    <span class="iconify text-gray-900" data-icon="solar:users-group-two-rounded-linear" style="font-size: 20px;"></span>
                    <span class="sidebar-label text-sm transition-opacity duration-200">Customers</span>
                </a>
                
                <a href="{{ route('services.index') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('services.index') ? 'bg-gray-50 text-gray-900 font-semibold' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}" title="Services">
                    <span class="iconify text-gray-400" data-icon="solar:box-linear" style="font-size: 20px;"></span>
                    <span class="sidebar-label text-sm font-medium transition-opacity duration-200">Services</span>
                </a>
                
                <a href="{{ route('subscriptions.index') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('subscriptions.index') ? 'bg-gray-50 text-gray-900 font-semibold' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}" title="Subscription">
                    <span class="iconify text-gray-400" data-icon="solar:document-text-linear" style="font-size: 20px;"></span>
                    <span class="sidebar-label text-sm font-medium transition-opacity duration-200">Subscription</span>
                </a>
            </nav>

            <div class="px-3 py-4 border-t border-gray-100">
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all duration-200 text-gray-500 hover:bg-red-50 hover:text-red-600 cursor-pointer text-left" title="Sign Out">
                        <span class="iconify text-gray-400 hover:text-inherit" data-icon="solar:logout-linear" style="font-size: 20px;"></span>
                        <span class="sidebar-label text-sm font-medium transition-opacity duration-200">Sign Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col min-w-0 bg-[#F9FAFB]">
            
            <div class="px-8 pt-8 pb-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-900 tracking-tight">Customers</h1>
                    
                    <button onclick="openModal()" class="inline-flex items-center gap-2 bg-[#1F2937] hover:bg-gray-900 text-white px-4 py-2 text-sm font-medium rounded-lg shadow-xs transition-all cursor-pointer">
                        <span class="iconify" data-icon="material-symbols:add-rounded" style="font-size: 18px;"></span>
                        Add Data
                    </button>
                </div>

                @if(session('success'))
                    <div class="mt-4 p-3.5 bg-green-50 border border-green-200 text-green-700 text-xs rounded-xl font-semibold flex items-center gap-2 animate-in fade-in duration-300">
                        <span class="iconify text-green-600" data-icon="material-symbols:check-circle-rounded" style="font-size: 16px;"></span>
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <div class="px-8 pb-8 flex-1">
                <div class="bg-white border border-gray-200 rounded-xl shadow-xs overflow-visible">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50/70 text-xs font-semibold text-gray-500 tracking-wider">
                                <th class="py-3.5 px-6">Customer ID</th>
                                <th class="py-3.5 px-6">Customer Name</th>
                                <th class="py-3.5 px-6">Email</th>
                                <th class="py-3.5 px-6">Address</th>
                                <th class="py-3.5 px-6">Status</th>
                                <th class="py-3.5 px-6 text-center w-24">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm text-gray-600">
                            
                            @forelse ($customers as $customer)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6 font-medium text-gray-900">{{ $customer->customer_id ?? $customer['customer_id'] ?? '-' }}</td>
                                <td class="py-4 px-6 font-medium text-gray-700">{{ $customer->name ?? $customer['name'] ?? '-' }}</td>
                                <td class="py-4 px-6 text-gray-500">{{ $customer->email ?? $customer['email'] ?? '-' }}</td>
                                <td class="py-4 px-6 text-gray-500">{{ $customer->address ?? $customer['address'] ?? '-' }}</td>
                                <td class="py-4 px-6">
                                    @php 
                                        $statusValue = $customer->status ?? $customer['status'] ?? '';
                                    @endphp
                                    @if($statusValue === 'active' || $statusValue === true || $statusValue === 1)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-green-50 text-green-700 border border-green-200">Active</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-red-50 text-red-600 border border-red-100">Inactive</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-center relative overflow-visible">
                                    <button onclick="toggleDropdown(event, 'dropdown-{{ $customer->id ?? $customer['id'] }}')" class="text-gray-400 hover:text-gray-700 p-1.5 rounded-md hover:bg-gray-50 cursor-pointer inline-flex items-center justify-center">
                                        <span class="iconify" data-icon="lucide:menu" style="font-size: 18px;"></span>
                                    </button>
                                    
                                    <div id="dropdown-{{ $customer->id ?? $customer['id'] }}" class="dropdown-menu hidden absolute right-6 top-12 w-36 bg-white border border-gray-200 rounded-xl shadow-xl z-50 py-1 text-left">
                                        <button class="w-full px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 flex items-center gap-2.5 cursor-pointer font-medium">
                                            <span class="iconify text-gray-400" data-icon="solar:key-linear" style="font-size: 15px;"></span> Active
                                        </button>
                                        
                                        <button class="w-full px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 flex items-center gap-2.5 cursor-pointer font-medium">
                                            <span class="iconify text-gray-400" data-icon="solar:禁-linear" style="font-size: 15px;"></span> Deactivate
                                        </button>
                                        
                                        <button class="w-full px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 flex items-center gap-2.5 cursor-pointer font-medium">
                                            <span class="iconify text-gray-400" data-icon="solar:pen-linear" style="font-size: 15px;"></span> Edit
                                        </button>
                                        <div class="border-t border-gray-100 my-1"></div>
                                        
                                        <button class="w-full px-4 py-2 text-xs text-red-600 hover:bg-red-50 flex items-center gap-2.5 cursor-pointer font-semibold">
                                            <span class="iconify text-red-500" data-icon="solar:trash-bin-trash-linear" style="font-size: 15px;"></span> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-gray-400 font-medium">No customers found.</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <div id="add-customer-modal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden opacity-0 transition-opacity duration-200">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-200">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-base font-bold text-gray-900">Add Customer</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 cursor-pointer">
                    <span class="iconify" data-icon="material-symbols:close-rounded" style="font-size: 20px;"></span>
                </button>
            </div>
            
            <form action="{{ route('customers.store') }}" method="POST" class="px-6 py-4 space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Customer ID</label>
                    <input type="text" name="customer_id" required placeholder="Enter your ID" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-gray-400 bg-gray-50/50">
                </div>
                
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Customer Name</label>
                    <input type="text" name="name" required placeholder="Enter your name" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-gray-400 bg-gray-50/50">
                </div>
                
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Email</label>
                    <input type="email" name="email" required placeholder="Enter your email" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-gray-400 bg-gray-50/50">
                </div>
                
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Address</label>
                    <input type="text" name="address" required placeholder="Enter your address" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-gray-400 bg-gray-50/50">
                </div>
                
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Status</label>
                    <select name="status" required class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-gray-400 bg-gray-50/50 text-gray-500 cursor-pointer">
                        <option value="" disabled selected>Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                
                <div class="pt-3 flex items-center justify-end gap-2 border-t border-gray-100 mt-6">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-xs font-medium text-gray-500 hover:text-gray-700 bg-white border border-gray-200 rounded-lg cursor-pointer">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-xs font-medium text-white bg-[#1F2937] hover:bg-gray-900 rounded-lg cursor-pointer">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // 1. Sidebar Collapse Control
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.getElementById('sidebar-toggle');
            if (!sidebar || !toggle) return;

            const labels = sidebar.querySelectorAll('.sidebar-label');

            toggle.addEventListener('click', () => {
                sidebar.classList.toggle('w-64');
                sidebar.classList.toggle('w-20');
                labels.forEach(label => label.classList.toggle('hidden'));
            });
        });

        // 2. Action Menu Dropdown Control
        function toggleDropdown(event, id) {
            event.stopPropagation();
            
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if(menu.id !== id) menu.classList.add('hidden');
            });
            
            const target = document.getElementById(id);
            if(target) target.classList.toggle('hidden');
        }

        window.addEventListener('click', () => {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        });

        // 3. Modal Popup Functions
        function openModal() {
            const modal = document.getElementById('add-customer-modal');
            const modalBox = modal.querySelector('.transform');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modalBox.classList.remove('scale-95');
                modalBox.classList.add('scale-100');
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById('add-customer-modal');
            const modalBox = modal.querySelector('.transform');
            
            modal.classList.add('opacity-0');
            modalBox.classList.remove('scale-100');
            modalBox.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 200);
        }
    </script>
</body>
</html>