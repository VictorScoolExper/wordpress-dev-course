import { Rating } from "@mui/material";
// this comes from wordpress version of the equivelent react version
import { render, useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

function RecipeRating(props) {
    const [ avgRating, setAvgRating ] = useState(props.avgRating);
    const [ permission, setPermission ] = useState(props.loggedIn);

    useEffect(()=> {
        if(props.ratingCount){
            setPermission(false);
        }
    }, [])

    return (
        <Rating
            value={avgRating}
            precision={0.5}
            onChange={async (event, rating) => {
                if(!permission){
                    return alert('You have already rated this recipe or you have to login')
                }

                setPermission(false);

                const response = await apiFetch({
                    path: 'up/v1/rate',
                    method: 'POST',
                    data: {
                        postID: props.postID,
                        rating
                    }
                });

                if(response.status === 2){
                    setAvgRating(response.rating);
                }
            }}
        />
    )
}

document.addEventListener('DOMContentLoaded', () => {
    const block = document.querySelector('#recipe-rating');
    // database data 
    const postID = parseInt(block.dataset.postId);
    const avgRating = parseFloat(block.dataset.avgRating);
    // turns them into a boolean value
    const loggedIn = !!block.dataset.loggedIn;
    // console.log(postID, avgRating, loggedIn);
    const ratingCount = !!parseInt(block.dataset.ratingCount);

    render(
        <RecipeRating 
            postID={postID}
            avgRating={avgRating}
            loggedIn={loggedIn}
            ratingCount={ratingCount}
        />, 
        block
    )
})