<script setup>
import { ref } from 'vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Breadcrumb, Button, ContextMenu, IconField, InputIcon, InputText, MegaMenu, Menu, Menubar, PanelMenu, Step, StepList, Stepper, Tab, TabList, Tabs, TieredMenu } from 'primevue';

const menu = ref(null);
const contextMenu = ref(null);

const nestedMenuitems = ref([
    {
        label: 'Customers',
        icon: 'pi pi-fw pi-table',
        items: [
            {
                label: 'New',
                icon: 'pi pi-fw pi-user-plus',
                items: [
                    {
                        label: 'Customer',
                        icon: 'pi pi-fw pi-plus'
                    },
                    {
                        label: 'Duplicate',
                        icon: 'pi pi-fw pi-copy'
                    }
                ]
            },
            {
                label: 'Edit',
                icon: 'pi pi-fw pi-user-edit'
            }
        ]
    },
    {
        label: 'Orders',
        icon: 'pi pi-fw pi-shopping-cart',
        items: [
            {
                label: 'View',
                icon: 'pi pi-fw pi-list'
            },
            {
                label: 'Search',
                icon: 'pi pi-fw pi-search'
            }
        ]
    },
    {
        label: 'Shipments',
        icon: 'pi pi-fw pi-envelope',
        items: [
            {
                label: 'Tracker',
                icon: 'pi pi-fw pi-compass'
            },
            {
                label: 'Map',
                icon: 'pi pi-fw pi-map-marker'
            },
            {
                label: 'Manage',
                icon: 'pi pi-fw pi-pencil'
            }
        ]
    },
    {
        label: 'Profile',
        icon: 'pi pi-fw pi-user',
        items: [
            {
                label: 'Settings',
                icon: 'pi pi-fw pi-cog'
            },
            {
                label: 'Billing',
                icon: 'pi pi-fw pi-file'
            }
        ]
    },
    {
        label: 'Quit',
        icon: 'pi pi-fw pi-sign-out'
    }
]);
const breadcrumbHome = ref({ icon: 'pi pi-home', to: '/' });
const breadcrumbItems = ref([{ label: 'Computer' }, { label: 'Notebook' }, { label: 'Accessories' }, { label: 'Backpacks' }, { label: 'Item' }]);
const tieredMenuItems = ref([
    {
        label: 'Customers',
        icon: 'pi pi-fw pi-table',
        items: [
            {
                label: 'New',
                icon: 'pi pi-fw pi-user-plus',
                items: [
                    {
                        label: 'Customer',
                        icon: 'pi pi-fw pi-plus'
                    },
                    {
                        label: 'Duplicate',
                        icon: 'pi pi-fw pi-copy'
                    }
                ]
            },
            {
                label: 'Edit',
                icon: 'pi pi-fw pi-user-edit'
            }
        ]
    },
    {
        label: 'Orders',
        icon: 'pi pi-fw pi-shopping-cart',
        items: [
            {
                label: 'View',
                icon: 'pi pi-fw pi-list'
            },
            {
                label: 'Search',
                icon: 'pi pi-fw pi-search'
            }
        ]
    },
    {
        label: 'Shipments',
        icon: 'pi pi-fw pi-envelope',
        items: [
            {
                label: 'Tracker',
                icon: 'pi pi-fw pi-compass'
            },
            {
                label: 'Map',
                icon: 'pi pi-fw pi-map-marker'
            },
            {
                label: 'Manage',
                icon: 'pi pi-fw pi-pencil'
            }
        ]
    },
    {
        label: 'Profile',
        icon: 'pi pi-fw pi-user',
        items: [
            {
                label: 'Settings',
                icon: 'pi pi-fw pi-cog'
            },
            {
                label: 'Billing',
                icon: 'pi pi-fw pi-file'
            }
        ]
    },
    {
        separator: true
    },
    {
        label: 'Quit',
        icon: 'pi pi-fw pi-sign-out'
    }
]);
const overlayMenuItems = ref([
    {
        label: 'Save',
        icon: 'pi pi-save'
    },
    {
        label: 'Update',
        icon: 'pi pi-refresh'
    },
    {
        label: 'Delete',
        icon: 'pi pi-trash'
    },
    {
        separator: true
    },
    {
        label: 'Home',
        icon: 'pi pi-home'
    }
]);
const menuitems = ref([
    {
        label: 'Customers',
        items: [
            {
                label: 'New',
                icon: 'pi pi-fw pi-plus'
            },
            {
                label: 'Edit',
                icon: 'pi pi-fw pi-user-edit'
            }
        ]
    },
    {
        label: 'Orders',
        items: [
            {
                label: 'View',
                icon: 'pi pi-fw pi-list'
            },
            {
                label: 'Search',
                icon: 'pi pi-fw pi-search'
            }
        ]
    }
]);
const contextMenuItems = ref([
    {
        label: 'Save',
        icon: 'pi pi-save'
    },
    {
        label: 'Update',
        icon: 'pi pi-refresh'
    },
    {
        label: 'Delete',
        icon: 'pi pi-trash'
    },
    {
        separator: true
    },
    {
        label: 'Options',
        icon: 'pi pi-cog'
    }
]);
const megamenuItems = ref([
    {
        label: 'Fashion',
        icon: 'pi pi-fw pi-tag',
        items: [
            [
                {
                    label: 'Woman',
                    items: [{ label: 'Woman Item' }, { label: 'Woman Item' }, { label: 'Woman Item' }]
                },
                {
                    label: 'Men',
                    items: [{ label: 'Men Item' }, { label: 'Men Item' }, { label: 'Men Item' }]
                }
            ],
            [
                {
                    label: 'Kids',
                    items: [{ label: 'Kids Item' }, { label: 'Kids Item' }]
                },
                {
                    label: 'Luggage',
                    items: [{ label: 'Luggage Item' }, { label: 'Luggage Item' }, { label: 'Luggage Item' }]
                }
            ]
        ]
    },
    {
        label: 'Electronics',
        icon: 'pi pi-fw pi-desktop',
        items: [
            [
                {
                    label: 'Computer',
                    items: [{ label: 'Computer Item' }, { label: 'Computer Item' }]
                },
                {
                    label: 'Camcorder',
                    items: [{ label: 'Camcorder Item' }, { label: 'Camcorder Item' }, { label: 'Camcorder Item' }]
                }
            ],
            [
                {
                    label: 'TV',
                    items: [{ label: 'TV Item' }, { label: 'TV Item' }]
                },
                {
                    label: 'Audio',
                    items: [{ label: 'Audio Item' }, { label: 'Audio Item' }, { label: 'Audio Item' }]
                }
            ],
            [
                {
                    label: 'Sports.7',
                    items: [{ label: 'Sports.7.1' }, { label: 'Sports.7.2' }]
                }
            ]
        ]
    },
    {
        label: 'Furniture',
        icon: 'pi pi-fw pi-image',
        items: [
            [
                {
                    label: 'Living Room',
                    items: [{ label: 'Living Room Item' }, { label: 'Living Room Item' }]
                },
                {
                    label: 'Kitchen',
                    items: [{ label: 'Kitchen Item' }, { label: 'Kitchen Item' }, { label: 'Kitchen Item' }]
                }
            ],
            [
                {
                    label: 'Bedroom',
                    items: [{ label: 'Bedroom Item' }, { label: 'Bedroom Item' }]
                },
                {
                    label: 'Outdoor',
                    items: [{ label: 'Outdoor Item' }, { label: 'Outdoor Item' }, { label: 'Outdoor Item' }]
                }
            ]
        ]
    },
    {
        label: 'Sports',
        icon: 'pi pi-fw pi-star',
        items: [
            [
                {
                    label: 'Basketball',
                    items: [{ label: 'Basketball Item' }, { label: 'Basketball Item' }]
                },
                {
                    label: 'Football',
                    items: [{ label: 'Football Item' }, { label: 'Football Item' }, { label: 'Football Item' }]
                }
            ],
            [
                {
                    label: 'Tennis',
                    items: [{ label: 'Tennis Item' }, { label: 'Tennis Item' }]
                }
            ]
        ]
    }
]);
const panelMenuitems = ref([
    {
        label: 'Customers',
        icon: 'pi pi-fw pi-table',
        items: [
            {
                label: 'New',
                icon: 'pi pi-fw pi-user-plus',
                items: [
                    {
                        label: 'Customer',
                        icon: 'pi pi-fw pi-plus'
                    },
                    {
                        label: 'Duplicate',
                        icon: 'pi pi-fw pi-copy'
                    }
                ]
            },
            {
                label: 'Edit',
                icon: 'pi pi-fw pi-user-edit'
            }
        ]
    },
    {
        label: 'Orders',
        icon: 'pi pi-fw pi-shopping-cart',
        items: [
            {
                label: 'View',
                icon: 'pi pi-fw pi-list'
            },
            {
                label: 'Search',
                icon: 'pi pi-fw pi-search'
            }
        ]
    },
    {
        label: 'Shipments',
        icon: 'pi pi-fw pi-envelope',
        items: [
            {
                label: 'Tracker',
                icon: 'pi pi-fw pi-compass'
            },
            {
                label: 'Map',
                icon: 'pi pi-fw pi-map-marker'
            },
            {
                label: 'Manage',
                icon: 'pi pi-fw pi-pencil'
            }
        ]
    },
    {
        label: 'Profile',
        icon: 'pi pi-fw pi-user',
        items: [
            {
                label: 'Settings',
                icon: 'pi pi-fw pi-cog'
            },
            {
                label: 'Billing',
                icon: 'pi pi-fw pi-file'
            }
        ]
    }
]);

function toggleMenu(event) {
    menu.value.toggle(event);
}

function onContextRightClick(event) {
    contextMenu.value.show(event);
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="card">
            <div class="mb-4 text-xl font-semibold">Menubar</div>
            <Menubar :model="nestedMenuitems">
                <template #end>
                    <IconField iconPosition="left">
                        <InputIcon class="pi pi-search" />
                        <InputText type="text" placeholder="Search" />
                    </IconField>
                </template>
            </Menubar>
        </div>

        <div class="card">
            <div class="mb-4 text-xl font-semibold">Breadcrumb</div>
            <Breadcrumb :home="breadcrumbHome" :model="breadcrumbItems" />
        </div>

        <div class="flex flex-col gap-8 md:flex-row">
            <div class="md:w-1/2">
                <div class="card">
                    <div class="mb-4 text-xl font-semibold">Steps</div>
                    <Stepper value="1">
                        <StepList>
                            <Step value="1">Header I</Step>
                            <Step value="2">Header II</Step>
                            <Step value="3">Header III</Step>
                        </StepList>
                    </Stepper>
                </div>
            </div>
            <div class="md:w-1/2">
                <div class="card">
                    <div class="mb-4 text-xl font-semibold">TabMenu</div>
                    <Tabs value="0">
                        <TabList>
                            <Tab value="0">Header I</Tab>
                            <Tab value="1">Header II</Tab>
                            <Tab value="2">Header III</Tab>
                        </TabList>
                    </Tabs>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-8 mt-6 md:flex-row">
            <div class="md:w-1/3">
                <div class="card">
                    <div class="mb-4 text-xl font-semibold">Tiered Menu</div>
                    <TieredMenu :model="tieredMenuItems" />
                </div>
            </div>
            <div class="md:w-1/3">
                <div class="card">
                    <div class="mb-4 text-xl font-semibold">Plain Menu</div>
                    <Menu :model="menuitems" />
                </div>
            </div>
            <div class="md:w-1/3">
                <div class="card">
                    <div class="mb-4 text-xl font-semibold">Overlay Menu</div>
                    <Menu ref="menu" :model="overlayMenuItems" :popup="true" />
                    <Button type="button" label="Options" icon="pi pi-angle-down" @click="toggleMenu"
                        style="width: auto" />
                </div>

                <div class="card" @contextmenu="onContextRightClick">
                    <div class="mb-4 text-xl font-semibold">Context Menu</div>
                    Right click to display.
                    <ContextMenu ref="contextMenu" :model="contextMenuItems" />
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-8 mt-8 md:flex-row">
            <div class="md:w-1/2">
                <div class="card">
                    <div class="mb-4 text-xl font-semibold">MegaMenu | Horizontal</div>
                    <MegaMenu :model="megamenuItems" />

                    <div class="mt-8 mb-4 text-xl font-semibold">MegaMenu | Vertical</div>
                    <MegaMenu :model="megamenuItems" orientation="vertical" />
                </div>
            </div>
            <div class="md:w-1/2">
                <div class="card">
                    <div class="mb-4 text-xl font-semibold">PanelMenu</div>
                    <PanelMenu :model="panelMenuitems" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
