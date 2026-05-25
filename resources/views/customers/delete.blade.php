<div id="modal-delete" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center z-50 hidden opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-2xl p-6 w-full max-w-sm shadow-xl transform scale-95 transition-transform duration-300 text-center">
        
        <div class="w-12 h-12 rounded-full bg-red-50 text-red-500 flex items-center justify-center mx-auto mb-4">
            <span class="iconify" data-icon="material-symbols:delete-outline" style="font-size: 26px;"></span>
        </div>

        <h3 class="text-base font-bold text-gray-900 mb-2">Delete Customer</h3>
        <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete this customer data? This action cannot be undone.</p>

        <form action="#" method="POST" class="flex items-center justify-center gap-3">
            @csrf
            @method('DELETE')
            <button type="button" onclick="toggleModal('delete', false)" class="w-full px-4 py-2.5 text-sm font-medium text-gray-500 bg-gray-50 hover:bg-gray-100 rounded-xl transition-colors cursor-pointer">Cancel</button>
            <button type="submit" class="w-full px-4 py-2.5 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-xl transition-colors cursor-pointer">Delete</button>
        </form>
    </div>
</div>