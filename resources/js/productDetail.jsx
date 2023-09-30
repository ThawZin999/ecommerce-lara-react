import { createRoot } from "react-dom/client";
import { HashRouter, Routes, Route } from "react-router-dom";

import ProductDetail from "./ProductDetail/ProductDetail.jsx";

const App = () => {
    return (
        <HashRouter>
            <Routes>
                <Route path="/" element={<ProductDetail />} />
            </Routes>
        </HashRouter>
    );
};

createRoot(document.getElementById("app")).render(<App />);
