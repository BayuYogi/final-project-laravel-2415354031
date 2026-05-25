<div id="modal-edit" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center z-50 hidden opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-xl transform scale-95 transition-transform duration-300">
        
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-base font-bold text-gray-900 mx-auto">Edit Customer</h3>
        </div>

        <form action="#" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Customer ID</label>
                <input type="text" id="edit_customer_id" name="customer_id" class="w-full px-3.5 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-slate-400 bg-slate-50/50" readonly>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Customer Name</label>
                <input type="text" id="edit_name" name="name" class="w-full px-3.5 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-slate-400 bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Email</label>
                <input type="email" id="edit_email" name="email" class="w-full px-3.5 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-slate-400 bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Address</label>
                <input type="text" id="edit_address" name="address" class="w-full px-3.5 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-slate-400 bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Status</label>
                <select id="edit_status" name="status" class="w-full px-3.5 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-slate-400 bg-slate-50/50 text-gray-700">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="flex items-center justify-end gap-2 pt-4">
                <button type="button" onclick="toggleModal('edit', false)" class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-xl transition-colors cursor-pointer">Cancel</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-colors cursor-pointer">Save Changes</button>
            </div>
        </form>
    </div>
</div>