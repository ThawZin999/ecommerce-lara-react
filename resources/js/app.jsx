import { createRoot } from "react-dom/client";
import { HashRouter, Routes, Route, Link } from "react-router-dom";

import Home from "./pages/Home.jsx";
import About from "./pages/About";

const MainRouter = () => {
    return (
        <HashRouter>
            <Link to="/">Home</Link>
            <Link to="/about">About</Link>

            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/about" element={<About />} />
            </Routes>
        </HashRouter>
    );
};

createRoot(document.getElementById("app")).render(<MainRouter />);
