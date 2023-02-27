import { createRouter, createWebHistory } from "vue-router";
import Home from "../Pages/Home.vue";
import ProductShow from "../Pages/Product/Show.vue"
import CartEdit from "../Pages/Cart/Edit.vue"
import CategoryShow from "../Pages/Category/Show.vue"
import OrderCreate from "../Pages/Order/Create.vue"
import OrderShow from "../Pages/Order/Show.vue"
import PackageShow from "../Pages/Package/Show.vue"
import Login from "../Pages/Auth/Login.vue"

const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/cart",
        name: "cart.show",
        component: CartEdit,
    },
    {
        path: "/product/:slug",
        name: "product.show",
        component: ProductShow,
    },
    {
        path: "/category/:slug",
        name: "category.show",
        component: CategoryShow,
    },
    {
        path: "/order/checkout",
        name: "order.create",
        component: OrderCreate,
    },
    {
        path: "/order/summary/:id",
        name: "order.show",
        component: OrderShow,
    },
    {
        path: "/package/:slug",
        name: "package.show",
        component: PackageShow,
    },
    {
        path: "/auth/login",
        name: "auth.login",
        component: Login,
    }
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    scrollBehavior(to, from, savedPosition) {
        return { top: 0 }
    },
    routes,
});

export default router;
