<script>
import ListItem from "@/Components/Form/ListItem.vue";

export default {
    name: 'DropDownList',
    components: { ListItem }
};
</script>

<template>
    <ul class="divide-y divide-gray-300 bg-white text-gray-500">
        <li>
            <ListItem href="/login">Login</ListItem>
        </li>
        <li>
            <ListItem href="/create-account">SignUp</ListItem>
        </li>
        <li>
           <ListItem href="/about">About</ListItem>
        </li>
        <li>
           <ListItem href="/discover">Discover</ListItem>
        </li>
    </ul>
</template>

<style scoped></style>
