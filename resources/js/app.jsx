import { createRoot } from "react-dom/client";
import { HashRouter, Routes, Route } from "react-router-dom";

import Home from "./Home/Home.jsx";

const App = () => {
    return (
        <HashRouter>
            <Routes>
                <Route exact path="/" element={<Home />} />
            </Routes>
        </HashRouter>
    );
};

createRoot(document.getElementById("root")).render(<App />);
