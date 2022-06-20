import axios from "axios";

export const authClient = axios.create({
    withCredentials: true, // required to handle the CSRF token
});

export default {
    getComments(blog) {
        return authClient.get(`/api/blogs/${blog}/comments`);
    },
    postComment(payload, blog) {
        return authClient.post(`/api/blogs/${blog}/comments`, payload);
    },
};
