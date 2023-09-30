import axios from "axios";
import React, { useEffect, useState } from "react";
import Spinner from "../Component/Spinner";
import SmallSpinner from "../Component/SmallSpinner";

export default function Profile() {
    const [userimage, setUserImage] = useState(null);
    const [selectedimage, setSelectedImage] = useState(null);
    const [name, setName] = useState("");
    const [phone, setPhone] = useState("");
    const [address, setAddress] = useState("");
    const [loader, setLoader] = useState(true);
    const [smallloader, setSmallLoader] = useState(false);

    const user_id = window.auth.id;
    useEffect(() => {
        axios.get("/api/showProfile?user_id=" + user_id).then((d) => {
            const { data } = d;

            setLoader(false);
            setUserImage(data.data.image);
            setName(data.data.name);
            setPhone(data.data.phone);
            setAddress(data.data.address);
        });
    }, []);

    const changeProfile = () => {
        setSmallLoader(true);
        const user_id = window.auth.id;
        axios
            .post("/api/changeProfile?user_id=" + user_id, {
                name,
                phone,
                address,
            })
            .then((d) => {
                setSmallLoader(false);
                const { data } = d;
                if (data.message === true) {
                    showToast("Profile Updated Successfully.");
                }
            });
    };

    return (
        <div>
            <div className="container mt-3">
                {loader && <Spinner />}
                {!loader && (
                    <div className="card">
                        <div className="form-group">
                            <label htmlFor="phone">Name</label>
                            <input
                                className="form-control"
                                value={name}
                                onChange={(e) => setName(e.target.value)}
                                type="text"
                            />
                        </div>
                        <div className="form-group">
                            <label htmlFor="phone">Phone</label>
                            <input
                                className="form-control"
                                value={phone}
                                onChange={(e) => setPhone(e.target.value)}
                                type="text"
                            />
                        </div>
                        <div className="form-group">
                            <label htmlFor="">Address</label>
                            <input
                                className="form-control"
                                value={address}
                                onChange={(e) => setAddress(e.target.value)}
                                type="text"
                            />
                        </div>
                        <div>
                            <button
                                className="btn btn-dark p-3 mb-3"
                                onClick={() => changeProfile()}
                            >
                                {smallloader && <SmallSpinner />}
                                Change Profile
                            </button>
                        </div>
                    </div>
                )}
            </div>
        </div>
    );
}
