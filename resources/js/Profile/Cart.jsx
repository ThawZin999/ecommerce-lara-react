import React, { useEffect, useState } from "react";
import Spinner from "../Component/Spinner";
import SmallSpinner from "../Component/SmallSpinner";
import axios from "axios";

export default function Cart() {
    const [loader, setLoader] = useState(true);
    const [cart, setCart] = useState([]);
    const [qtyloader, setQtyloader] = useState(false);

    const user_id = window.auth.id;
    useEffect(() => {
        axios.get("/api/get-cart?user_id=" + user_id).then((d) => {
            const { data } = d;
            setCart(data.data);
            setLoader(false);
        });
    }, []);

    const updateCart = (id, type) => {
        const updatedCart = cart.map((d) => {
            if (id == d.id) {
                switch (type) {
                    case "add":
                        d.total_quantity += 1;
                        break;

                    default:
                        if (d.total_quantity > 0) {
                            d.total_quantity -= 1;
                        }
                        break;
                }
            }
            return d;
        });
        setCart(updatedCart);
    };

    const saveQty = (id, qty) => {
        if (qty == 0) {
            removeCart(id, qty);
            return id;
        } else {
            updateQty(id, qty);
        }
    };
    const updateQty = (id, qty) => {
        setQtyloader(id);
        axios
            .post("/api/update-cart-qty", { card_id: id, total_qty: qty })
            .then((d) => {
                if (d.data.message === true) {
                    showToast("Cart Quantity Updated");
                    setQtyloader(false);
                }
            });
    };

    const removeCart = (id) => {
        axios.post("/api/remove-cart", { card_id: id }).then((d) => {
            if (d.data.message === true) {
                setCart((preCart) => preCart.filter((d) => d.id !== id));
                showToast("Product Removed from Cart.");
            }
        });
    };

    const TotalPrice = () => {
        var total_price = 0;
        cart.map((d) => {
            total_price += d.product.sale_price * d.total_quantity;
        });
        return <span>{total_price} Ks</span>;
    };

    const checkout = () => {
        const user_id = window.auth.id;
        axios.post("/api/checkout?user_id=" + user_id).then((d) => {
            if (d.data.message == true) {
                showToast(
                    "Checked Out Successfully. Can see your items in order list."
                );
                setCart([]);
                window.updateCart(0);
            }
        });
    };
    return (
        <div className="container-fluid mt-3">
            <div className="card p-3">
                <div>
                    <h4>Cart</h4>
                    {loader && <Spinner />}
                    {!loader && (
                        <>
                            <table className="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" className="text-center">
                                            Image
                                        </th>
                                        <th scope="col" className="text-center">
                                            Name
                                        </th>
                                        <th scope="col" className="text-center">
                                            Price
                                        </th>
                                        <th scope="col" className="text-center">
                                            Quantity
                                        </th>
                                        <th scope="col" className="text-center">
                                            Add or Remove
                                        </th>
                                        <th scope="col" className="text-center">
                                            Delete
                                        </th>
                                        <th scope="col" className="text-center">
                                            Total Price
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {cart.map((d) => (
                                        <tr key={d.id}>
                                            <td
                                                className="text-center"
                                                scope="row"
                                            >
                                                <img
                                                    style={{ width: 60 }}
                                                    src={d.product.image_url}
                                                    alt={d.product.name}
                                                />
                                            </td>
                                            <td className="text-center">
                                                {d.product.name}
                                            </td>
                                            <td className="text-center">
                                                {d.product.sale_price}
                                            </td>
                                            <td className="text-center">
                                                {d.total_quantity}
                                            </td>
                                            <td className="text-center">
                                                <button
                                                    className="btn btn-dark btn-sm"
                                                    onClick={() =>
                                                        updateCart(
                                                            d.id,
                                                            "reduce"
                                                        )
                                                    }
                                                >
                                                    -
                                                </button>
                                                <input
                                                    type="number"
                                                    min="0"
                                                    className="btn border-warning"
                                                    value={d.total_quantity}
                                                    disabled={true}
                                                />
                                                <button
                                                    className="btn btn-dark btn-sm"
                                                    onClick={() =>
                                                        updateCart(d.id, "add")
                                                    }
                                                >
                                                    +
                                                </button>
                                                <button
                                                    className="btn btn-primary btn-sm"
                                                    onClick={() => {
                                                        saveQty(
                                                            d.id,
                                                            d.total_quantity
                                                        );
                                                    }}
                                                >
                                                    {qtyloader === d.id && (
                                                        <SmallSpinner />
                                                    )}
                                                    Save
                                                </button>
                                            </td>
                                            <td className="text-center">
                                                <button
                                                    className="btn btn-danger btn-sm"
                                                    onClick={() =>
                                                        removeCart(d.id)
                                                    }
                                                >
                                                    <i className="fa fa-trash"></i>
                                                </button>
                                            </td>
                                            <td className="text-center bg-dark text-white">
                                                {d.total_quantity *
                                                    d.product.sale_price}
                                            </td>
                                        </tr>
                                    ))}
                                    <tr>
                                        <td colSpan={6}>
                                            <span className="float-right">
                                                Total:
                                            </span>
                                        </td>
                                        <td>
                                            <TotalPrice />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </>
                    )}
                </div>
                <div>
                    <button
                        className="btn btn-primary float-right"
                        onClick={() => checkout()}
                    >
                        CheckOut
                    </button>
                </div>
            </div>
        </div>
    );
}
