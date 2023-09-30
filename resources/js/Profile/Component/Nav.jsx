import React from "react";
import { Link, useLocation } from "react-router-dom";

export default function Nav() {
    const { pathname } = useLocation();
    return (
        <div className="container-fluid mt-3">
            <div className="card p-3 bg-dark text-center">
                <div>
                    <Link
                        to={"/"}
                        className={`btn btn${
                            pathname === "/" ? "" : "-outline"
                        }-warning`}
                    >
                        Cart List
                    </Link>
                    <Link
                        to={"/order"}
                        className={`btn btn${
                            pathname === "/order" ? "" : "-outline"
                        }-warning`}
                    >
                        Order
                    </Link>
                    <Link
                        to={"/Profile"}
                        className={`btn btn${
                            pathname === "/profile" ? "" : "-outline"
                        }-warning`}
                    >
                        Profile
                    </Link>
                    <Link
                        to={"/password"}
                        className={`btn btn${
                            pathname === "/password" ? "" : "-outline"
                        }-warning`}
                    >
                        Password Change
                    </Link>
                </div>
            </div>
        </div>
    );
}
