import { createRoot } from "react-dom/client";
import { HashRouter, Routes, Route } from "react-router-dom";

import Profile from "./Profile/Profile.jsx";
import Cart from "./Profile/Cart.jsx";
import Order from "./Profile/Order.jsx";
import Nav from "./Profile/Component/Nav.jsx";
import Password from "./Profile/Password.jsx";

const App = () => {
    return (
        <HashRouter>
            <Nav />
            <Routes>
                <Route path="/" element={<Cart />} />
                <Route path="/order" element={<Order />} />
                <Route path="/profile" element={<Profile />} />
                <Route path="/password" element={<Password />} />
            </Routes>
        </HashRouter>
    );
};

createRoot(document.getElementById("app")).render(<App />);
