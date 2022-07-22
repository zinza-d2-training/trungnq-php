import axios from "axios";
export default function() {
    let token = window.localStorage.getItem("token");
        if (token == null) {
            return false;
        } else {
            const config = {
                headers: {
                    Authorization: "Bearer " + token,
                },
            };
            axios
                .get("/api/checkToken", config)
                .then(function (response) {
                    return true;
                })
                .catch(() => {
                    return false;
                });
        }
}