import {
    HomeIcon,
    InformationCircleIcon,
    MagnifyingGlassIcon,
    PlusCircleIcon,
    UserCircleIcon,
} from '@heroicons/vue/24/outline';

// export const navItems = [
//     { name: 'Home', icon: HomeIcon, path: '/' },
//     { name: 'Explore', icon: MagnifyingGlassIcon, path: '/explore' },
//     { name: 'About', icon: InformationCircleIcon, path: '/about' },
//     {
//         name: 'Profile',
//         icon: UserCircleIcon,
//         path: `/${usePage().props?.auth.user?.username}`,
//     },
// ];

export const getUserProfile = (auth) => ({
    name: auth?.user?.username,
    avatar: auth?.user?.profilePic,
});

// export const bottomBarNavItems = [
//     { name: 'Home', icon: HomeIcon, path: '/' },
//     { name: 'Explore', icon: MagnifyingGlassIcon, path: '/explore' },
//     { name: 'create', icon: PlusCircleIcon, path: '/posts/create' },
//     { name: 'About', icon: InformationCircleIcon, path: '/about' },
//     {
//         name: 'Profile',
//         icon: UserCircleIcon,
//         path: `/${usePage().props?.auth.user?.username}`,
//     },
// ];

export const getSideBarNavItems = (auth) => {
    return [
        { name: 'Home', icon: HomeIcon, path: '/' },
        { name: 'Explore', icon: MagnifyingGlassIcon, path: '/explore' },
        { name: 'About', icon: InformationCircleIcon, path: '/about' },
        {
            name: 'Profile',
            icon: UserCircleIcon,
            path: `/${auth.user?.username}/profile`,
        },
    ];
};

export const getBottomBarNavItems = (auth) => {
    return [
        { name: 'Home', icon: HomeIcon, path: '/' },
        { name: 'Explore', icon: MagnifyingGlassIcon, path: '/explore' },
        { name: 'create', icon: PlusCircleIcon, path: '/posts/create' },
        { name: 'About', icon: InformationCircleIcon, path: '/about' },
        {
            name: 'Profile',
            icon: UserCircleIcon,
            path: `/${auth.user?.username}/profile`,
        },
    ];
};
