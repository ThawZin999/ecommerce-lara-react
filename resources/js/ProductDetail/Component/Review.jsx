import React, { useEffect, useState } from "react";
import StarRatings from "react-star-ratings";
import Spinner from "../../Component/Spinner";
import axios from "axios";

const Review = ({ review }) => {
    const [reviewList, setReviewList] = useState(review);
    const [comment, setComment] = useState("");
    const [rating, setRating] = useState(0);
    const [loader, setLoader] = useState(false);

    const disabledReview = rating && comment !== "" ? false : true;

    const makeReview = () => {
        const user_id = window.auth.id;
        const slug = window.product_slug;
        const data = { comment, user_id, slug, rating };

        axios
            .post("/api/make-review/" + slug, data)
            .then(({ data }) => {
                if (data.message === false) {
                    showToast("Product Not Found");
                } else {
                    setReviewList([...reviewList, data.data]);
                    setComment("");
                    setRating(0);
                    setLoader(false);
                }
            })
            .catch((error) => {
                console.error(error.response.data);
            });
    };

    return (
        <div>
            <div className="col-12" style={{ marginTop: 100 }}>
                {/* loop review */}

                {reviewList.map((d) => (
                    <div className="review" key={d.id}>
                        <div className="card p-3">
                            <div className="row">
                                <div className="col-md-2">
                                    <div className="d-flex justify-content-between">
                                        <img
                                            className="w-100 rounded-circle"
                                            src={d.user.image_url}
                                            alt="user_image"
                                        />
                                    </div>
                                </div>
                                <div className="col-md-10">
                                    <StarRatings
                                        rating={d.rating}
                                        starRatedColor="Gold"
                                        numberOfStars={5}
                                        name="rating"
                                        starDimension="20px"
                                    />
                                    <div className="name">
                                        <b>{d.user.name}</b>
                                    </div>
                                    <div className="mt-3">
                                        <small>{d.review}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ))}

                {window.auth && (
                    <div className="add-review mt-5">
                        {loader && <Spinner />}
                        {!loader && (
                            <>
                                <h4>Make Review</h4>
                                {/* rating component */}
                                <StarRatings
                                    rating={rating}
                                    starHoverColor="Gold"
                                    changeRating={(rateCount) =>
                                        setRating(rateCount)
                                    }
                                    numberOfStars={5}
                                    name="rating"
                                    starDimension="40px"
                                />
                                <div>
                                    <textarea
                                        value={comment}
                                        className="form-control"
                                        rows={5}
                                        placeholder="enter review"
                                        onChange={(e) =>
                                            setComment(e.target.value)
                                        }
                                    />
                                    <button
                                        className="btn btn-dark float-right mt-3"
                                        disabled={disabledReview}
                                        onClick={() => makeReview()}
                                    >
                                        Review
                                    </button>
                                </div>
                            </>
                        )}
                    </div>
                )}
            </div>
        </div>
    );
};

export default Review;
