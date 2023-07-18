import { createRoot } from "react-dom/client";
import { HashRouter, Routes, Route } from "react-router-dom";

import Home from "./pages/Home.jsx";

const MainRouter = () => {
    return (
        <HashRouter>
            <Routes>
                <Route path="/" element={<Home />} />
            </Routes>
        </HashRouter>
    );
};

createRoot(document.getElementById("app")).render(<MainRouter />);
