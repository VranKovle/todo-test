<div>
    {{-- Be like water. --}}
    <div class="border-[1.5px] p-5 rounded-md">
        @if ($bukaform)
            <button class="p-3 px-5 text-black bg-slate-200 rounded-full" wire:click="tutup">Close</button>
        @else
            <button class="p-3 text-white bg-blue-500 rounded-full" wire:click="buka">Tambah Tugas</button>
        @endif
        @if ($bukaform)
            <form wire:submit.prevent="simpan" class="p-4 md:p-5 space-y-4">
                <label for="">Nama Tugas :</label>
                <input type="text" class="w-full rounded-full" wire:model='nama'>
                <div>
                    @error($nama)
                        {{ $message }}
                    @enderror
                </div>
                <label for="">Status :</label>
                <select class="rounded-full w-full" wire:model='statusnya'>
                    <option value="">pilih</option>
                    <option value="belum selesai">Belum selesai</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
                <div>
                    @error($statusnya)
                        {{ $message }}
                    @enderror
                </div>
                <div>
                    <button wire:click="simpan" class="p-3 text-white bg-black rounded-full">Simpan</button>
                </div>
            </form>
        @endif

        <div class="mt-10">
            <table class="w-full border-2 border-black">
                <thead class="text-white bg-black text-center">
                    <tr>
                        <td class="py-3 w-2/4">Tugas</td>
                        <td class="w-1/4">Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($tugas as $tugas)
                        <tr>
                            <td class="py-3 capitalize">{{ $tugas->namatugas }}</td>
                            <td class="uppercase">{{ $tugas->status }}
                            </td>
                            <td>
                                @if ($bukaupdate)

                                @else
                                <button wire:click="openedit({{ $tugas->id }})" class="p-1 px-2 bg-green-500 text-white rounded-md">Edit</button>
                                @endif
                                <button class="p-1 px-2 bg-red-500 text-white rounded-md"
                                    wire:click="hapus({{ $tugas->id }})" wire:confirm="Hapus?">Hapus</button>

                            </td>
                        </tr>




                        @if ($bukaupdate && $selected == $tugas->id)
  <div class="bg-white justify-items-center overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Update Status
                  </h3>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4">
                <label for="">Status :</label>
                <select class="rounded-full" wire:model="statusnya">
                    <option selected>Ganti Status</option>
                    <option value="belum selesai">Belum selesai</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
                <div>
                    {{-- @error($statusnya)
                        {{ $message }}
                    @enderror --}}
                </div>

                <button class="p-3 text-white bg-black rounded-full"
                wire:click="update({{$tugas->id}})">Update Status</button>
                <button class="p-3 text-white bg-gray-500 rounded-full" wire:click="closeedit">Close</button>
            </div>
              <!-- Modal footer -->
              <div wire:click="closeedit" class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
              </div>
          </div>
      </div>
  </div>


{{-- Modal Update --}}


@endif

                    @endforeach
                </tbody>
            </table>


        </div>

    </div>


</div>
