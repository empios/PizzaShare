import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom';
import useAxios from "axios-hooks";


function FollowUser() {
    const element = document.getElementById("followbutton");
    const followstatus = element.getAttribute('follow-status');
    const userId = element.getAttribute('user-id');
    const [status, setStatus] = useState(followstatus)
    const [{data, loading, error}, executeFollow] = useAxios({
            url: '/follow/' + userId,
            method: 'POST'
        },
        {
            manual: true
        }
    )
    let type = '';
    if (status === 'false') {
        type = 'Follow';
    } else {
        type = 'Unfollow'
    }
    const [buttonText, setButtonText] = useState(type)

    useEffect(() =>{
        if (data !== undefined){
            data.attached.length === 0 ? setButtonText("Follow") : setButtonText("Unfollow")
        }
        if (error) {
            window.location = '/login';
        }
    });


    return (
        <button onClick={executeFollow} text="true" className="btn btn-primary">{buttonText}</button>
    );
}

export default FollowUser;

if (document.getElementById('followbutton')) {
    ReactDOM.render(<FollowUser/>, document.getElementById('followbutton'));
}
