## Routes:
`/api/upload` - image upload.

    Params:
    - user_id - int
    - test title - some text
    - file
    Validation rules can be found in this file:
    \app\Http\Requests\StoreImage.php
    (required|image|max:2000|mimes:jpeg,jpg,png)

`/api/images/{user_id}` - json with user images data.

_[
{"id":1,"title":"Title 1","path":"images\/originals\/6YyyfDpCdlCFvUCEUKTJ106PVJOdUlwfH6nz6f74.jpeg","size":65954,"user_id":1,"created_at":"2020-10-14T10:58:10.000000Z","updated_at":"2020-10-14T10:58:10.000000Z","url":"https:\/\/test-image-upload-api.s3.us-west-2.amazonaws.com\/images\/originals\/6YyyfDpCdlCFvUCEUKTJ106PVJOdUlwfH6nz6f74.jpeg","uploaded_time":"3 hours ago","size_in_kb":64.41},
{"id":3,"title":"Title 2","path":"images\/originals\/XLdWwAxyqyWvj33bEjCN1FStb2E7kCLgZLpSVAGV.jpeg","size":127864,"user_id":1,"created_at":"2020-10-14T11:23:31.000000Z","updated_at":"2020-10-14T11:23:31.000000Z","url":"https:\/\/test-image-upload-api.s3.us-west-2.amazonaws.com\/images\/originals\/XLdWwAxyqyWvj33bEjCN1FStb2E7kCLgZLpSVAGV.jpeg","uploaded_time":"3 hours ago","size_in_kb":124.87},
{"id":4,"title":"Title 3","path":"images\/originals\/4O0lrnxbYvfF9tuXwWKT7frzr1Wr8i66UZVSqrHU.jpeg","size":65954,"user_id":1,"created_at":"2020-10-14T11:30:45.000000Z","updated_at":"2020-10-14T11:30:45.000000Z","url":"https:\/\/test-image-upload-api.s3.us-west-2.amazonaws.com\/images\/originals\/4O0lrnxbYvfF9tuXwWKT7frzr1Wr8i66UZVSqrHU.jpeg","uploaded_time":"3 hours ago","size_in_kb":64.41}
]_

`/api/images/{user_id}` - json with  one selected user image.

_{"id":4,"title":"qqqqq","path":"images\/originals\/4O0lrnxbYvfF9tuXwWKT7frzr1Wr8i66UZVSqrHU.jpeg","size":65954,"user_id":1,"created_at":"2020-10-14T11:30:45.000000Z","updated_at":"2020-10-14T11:30:45.000000Z","url":"https:\/\/test-image-upload-api.s3.us-west-2.amazonaws.com\/images\/originals\/4O0lrnxbYvfF9tuXwWKT7frzr1Wr8i66UZVSqrHU.jpeg","uploaded_time":"3 hours ago","size_in_kb":64.41}_


I also added  small UI for testing. It can be found on the home page.
