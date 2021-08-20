## Social Media App

- App allows the user to [register](127.0.0.1:8000/api/user)/[update](127.0.0.1:8000/api/user/{id})/[retrieve](127.0.0.1:8000/api/user/{id})/[delete](127.0.0.1:8000/api/user/{id}) his/her info.
- User can [create](127.0.0.1:8000/api/post)/[update](127.0.0.1:8000/api/post/{id})/[retrieve](127.0.0.1:8000/api/post)/[delete](127.0.0.1:8000/api/post/{id}) posts.
- User can [create](127.0.0.1:8000/api/comment)/[update](127.0.0.1:8000/api/comment/{id})/[retrieve](127.0.0.1:8000/api/comment)/[delete](127.0.0.1:8000/api/comment/{id}) comments.

### Example POST Request for registering
{
    "name": "test_name",
    "email": "test@gmail.com"
}

### Example POST Request for Creating a Post
{
    "body": "first post",
    "user_id": 1,
    "location": "India",
    "mood": "happy"
}

### Example POST Request for making a comment
{
    "body": "first comment on post_id 1",
    "post_id": 1
}

### Format for retrieving posts
127.0.0.1:8000/api/post?post_id={post_id}&user_id={user_id}&location={location}&mood={mood}

### Format for retrieving comments
127.0.0.1:8000/api/comment?comment_id={comment_id}&post_id={post_id}

