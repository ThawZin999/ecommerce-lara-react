import axios from "axios";
import React, { useState } from "react";
import SmallSpinner from "../Component/SmallSpinner";

export default function Password() {
    const [currentPassword, setCurrentPassword] = useState("");
    const [newPassword, setNewPassword] = useState("");
    const [confirmPassword, setConfirmPassword] = useState("");
    const [loader, setLoader] = useState(false);

    const changePassword = () => {
        setLoader(true);
        const user_id = window.auth.id;
        if (newPassword !== confirmPassword) {
            setLoader(false);
            showToast("Wrong Confirmation Password", "error");
        } else {
            axios
                .post("/api/changePassword?user_id=" + user_id, {
                    currentPassword,
                    newPassword,
                })
                .then((d) => {
                    setLoader(false);
                    const { data } = d;
                    if (data.message === false) {
                        showToast("Wrong Current Password", "error");
                    } else {
                        showToast("Password Changed Successfully.");
                    }
                });
        }
    };

    return (
        <div>
            <div className="container p-3">
                <div className="card col-6">
                    <div className="form-group">
                        <label htmlFor="">Enter Current Password</label>
                        <input
                            type="password"
                            className="form-control"
                            onChange={(e) => setCurrentPassword(e.target.value)}
                        />
                    </div>
                    <div className="form-group">
                        <label htmlFor="">Enter New Password</label>
                        <input
                            type="password"
                            className="form-control"
                            onChange={(e) => setNewPassword(e.target.value)}
                        />
                    </div>
                    <div className="form-group">
                        <label htmlFor="">Enter Confirmation Password</label>
                        <input
                            type="password"
                            className="form-control"
                            onChange={(e) => setConfirmPassword(e.target.value)}
                        />
                    </div>
                    <div>
                        <button
                            className="btn btn-dark p-3"
                            onClick={() => changePassword()}
                        >
                            {loader && <SmallSpinner />}
                            Change Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
}
