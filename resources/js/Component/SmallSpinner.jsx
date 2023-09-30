import React from "react";

export default function SmallSpinner() {
    return (
        <span
            className="spinner-grow spinner-grow-sm"
            role="status"
            aria-hidden="true"
        >
            <span className="sr-only">Loading...</span>
        </span>
    );
}
