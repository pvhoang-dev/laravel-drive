<script setup>
// Imports
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import CreateFolderModal from "@/Components/app/CreateFolderModal.vue";
import { ref } from "vue";
import FileUploadMenuItem from "@/Components/app/FileUploadMenuItem.vue";
import FolderUploadMenuItem from "@/Components/app/FolderUploadMenuItem.vue";

const createFolderModal = ref(false);
function showCreateFolderModal() {
    createFolderModal.value = true;
}
</script>

<template>
    <Menu as="div" class="relative block text-left">
        <MenuButton
            class="flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
        >
            Create New
        </MenuButton>

        <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <MenuItems
                class="absolute left-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            >
                <div class="py-1">
                    <MenuItem v-slot="{ active }">
                        <a
                            href="#"
                            @click.prevent="showCreateFolderModal"
                            class="text-gray-700 block px-4 py-2 text-sm"
                        >
                            New Folder
                        </a>
                    </MenuItem>
                </div>
                <div class="px-1 py-1">
                    <FileUploadMenuItem />
                    <FolderUploadMenuItem />
                </div>
            </MenuItems>
        </transition>
    </Menu>
    <CreateFolderModal v-model="createFolderModal" />
</template>
