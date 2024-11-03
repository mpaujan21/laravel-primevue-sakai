<script setup>
import { useLayout } from '@/sakai-layout/composables/layout';
import { onBeforeMount, ref, watch } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const { layoutState, setActiveMenuItem, onMenuToggle } = useLayout();
const page = usePage();

const props = defineProps({
    item: {
        type: Object,
        default: () => ({})
    },
    index: {
        type: Number,
        default: 0
    },
    root: {
        type: Boolean,
        default: true
    },
    parentItemKey: {
        type: String,
        default: null
    }
});

const isActiveMenu = ref(false);
const itemKey = ref(null);

// Generate the item key and determine the initial active state
onBeforeMount(() => {
    itemKey.value = props.parentItemKey ? `${props.parentItemKey}-${props.index}` : String(props.index);

    const activeItem = layoutState.activeMenuItem;
    isActiveMenu.value = activeItem === itemKey.value || (activeItem ? activeItem.startsWith(`${itemKey.value}-`) : false);
});

// Watch for changes to activeMenuItem and update active state
watch(
    () => layoutState.activeMenuItem,
    (newVal) => {
        isActiveMenu.value = newVal === itemKey.value || newVal.startsWith(`${itemKey.value}-`);
    }
);

// Watch for route changes to update active state based on route
watch(
    () => page.url, // Watch for Inertia route URL changes
    (newUrl) => {
        isActiveMenu.value = newUrl === props.item.to;
    }
);

// Handle item clicks
function itemClick(event, item) {
    if (item.disabled) {
        event.preventDefault();
        return;
    }

    if ((item.to || item.url) && (layoutState.staticMenuMobileActive || layoutState.overlayMenuActive)) {
        onMenuToggle();
    }

    if (item.command) {
        item.command({ originalEvent: event, item });
    }

    const foundItemKey = item.items ? (isActiveMenu.value ? props.parentItemKey : itemKey) : itemKey.value;
    setActiveMenuItem(foundItemKey);
}

// Helper function to check active route
function checkActiveRoute(item) {
    return page.url === item.to;
}
</script>

<template>
    <li :class="{ 'layout-root-menuitem': root, 'active-menuitem': isActiveMenu }">
        <!-- Display root item text -->
        <div v-if="root && item.visible !== false" class="layout-menuitem-root-text">{{ item.label }}</div>

        <!-- External link or action item -->
        <a v-if="(!item.to || item.items) && item.visible !== false" :href="item.url" 
           @click="itemClick($event, item)" 
           :class="item.class" 
           :target="item.target" 
           tabindex="0">
            <i :class="item.icon" class="layout-menuitem-icon"></i>
            <span class="layout-menuitem-text">{{ item.label }}</span>
            <i class="pi pi-fw pi-angle-down layout-submenu-toggler" v-if="item.items"></i>
        </a>

        <!-- Inertia Link for internal navigation -->
        <Link v-if="item.to && !item.items && item.visible !== false" 
              @click="itemClick($event, item)" 
              :class="[item.class, { 'active-route': checkActiveRoute(item) }]" 
              :href="item.to" 
              tabindex="0">
            <i :class="item.icon" class="layout-menuitem-icon"></i>
            <span class="layout-menuitem-text">{{ item.label }}</span>
            <i class="pi pi-fw pi-angle-down layout-submenu-toggler" v-if="item.items"></i>
        </Link>

        <!-- Submenu for nested items -->
        <Transition v-if="item.items && item.visible !== false" name="layout-submenu">
            <ul v-show="root ? true : isActiveMenu" class="layout-submenu">
                <app-menu-item v-for="(child, i) in item.items" 
                               :key="child" 
                               :index="i" 
                               :item="child" 
                               :parentItemKey="itemKey" 
                               :root="false" />
            </ul>
        </Transition>
    </li>
</template>

<style lang="scss" scoped></style>