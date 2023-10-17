master -> main -> development -> SalmanIrfan

<!-- APIs -->
<h1>Laravel Blog Post System APIs</h1>

<h2> User Auth with Spatie Roles and Permissions</h2>

<!-- Register user -->
<pre>
BASE_URL = http://10.0.10.187:8000/api/v1
</pre>
<h4>Register User</h4>
<pre>
endpoint: /register
headers: none
</pre>

<table>
  <thead>
    <tr>
    <!-- table headers -->
      <th>Request</th>
      <th>Response</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <pre>
        <!-- request -->
{
    "name": "user two",
    "email" : "usertwo@user.com",
    "password" : "password"
}
        </pre>
      </td>
      <td>
        <pre>
        <!-- response -->
{
    "data": {
        "user_id": 5,
        "name": "user two",
        "email": "usertwo@user.com",
        "token": "9|hkH0SFHcl60B9gLu0PNMJt4nnr2DrUnbJUlNGCN26ed655c0",
        "roles": [
            "user"
        ],
        "roles.permissions": [
            "users.list"
        ],
        "permissions": [],
        "email_verified_at": null,
        "created_at": "2023-10-16T13:02:26.000000Z",
        "updated_at": "2023-10-16T13:02:26.000000Z"
    }
}
        </pre>
      </td>
    </tr>
  </tbody>
</table>

<!-- login -->

<h4>Login User</h4>
<pre>
endpoint: /login
headers: none
</pre>

<table>
  <thead>
    <tr>
    <!-- table headers -->
      <th>Request</th>
      <th>Response</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <pre>
        <!-- request -->
{
    "email" : "admin@admin.com",
    "password" : "password"
}
        </pre>
      </td>
      <td>
        <pre>
        <!-- response -->
{
    "data": {
        "user_id": 1,
        "name": "Admin",
        "email": "admin@admin.com",
        "token": "10|rUvIvB5Y9YWTuT5rw8NutkMZlQdEyv58adQcKfQB90b1ff79",
        "roles": [
            "admin"
        ],
        "roles.permissions": [
            "users.list",
            "users.view",
            "users.create",
            "users.update",
            "users.delete"
        ],
        "permissions": [
            "users.list",
            "users.view",
            "users.create",
            "users.update",
            "users.delete"
        ],
        "email_verified_at": null,
        "created_at": "2023-10-16T12:23:12.000000Z",
        "updated_at": "2023-10-16T12:23:12.000000Z"
    }
}
        </pre>
      </td>
    </tr>
  </tbody>
</table>

<!-- get admin logged in user role  -->
<h4>get admin logged in user role</h4>
<pre>
endpoint: /admin
headers: Authorization: Bearer { "Token" }
</pre>

<table>
  <thead>
    <tr>
    <!-- table headers -->
      <th>Request</th>
      <th>Response</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <pre>
        <!-- request -->
{
    null
}
        </pre>
      </td>
      <td>
        <pre>
        <!-- response -->
{
    "data": {
        "user_id": 1,
        "name": "Admin",
        "email": "admin@admin.com",
        "token": "26|PxSZ8AL5TZhOAPE9nGQmat9xsMa2R6gSI6Gof7xWa989219a",
        "roles": [
            "admin"
        ],
        "roles.permissions": [
            "users.list",
            "users.view",
            "users.create",
            "users.update",
            "users.delete"
        ],
        "permissions": [
            "users.list",
            "users.view",
            "users.create",
            "users.update",
            "users.delete"
        ],
        "email_verified_at": null,
        "created_at": "2023-10-16T12:23:12.000000Z",
        "updated_at": "2023-10-16T12:23:12.000000Z"
    }
}
        </pre>
      </td>
    </tr>
  </tbody>
</table>

<!-- get logged in user with user role -->

<h4>get logged in user with user role</h4>
<pre>
endpoint: /user
headers: Authorization: Bearer { "Token" }
</pre>

<table>
  <thead>
    <tr>
    <!-- table headers -->
      <th>Request</th>
      <th>Response</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <pre>
        <!-- request -->
{
    null
}
        </pre>
      </td>
      <td>
        <pre>
        <!-- response -->
{
    "data": {
        "user_id": 7,
        "name": "user three",
        "email": "userthree@user.com",
        "token": "28|Ji40rNHrT8s9h3t2q4mYXBHWeN4zw2o07Q5c7oMR9a4a4d61",
        "roles": [
            "user"
        ],
        "roles.permissions": [
            "users.list"
        ],
        "permissions": [],
        "email_verified_at": null,
        "created_at": "2023-10-17T10:11:45.000000Z",
        "updated_at": "2023-10-17T10:11:45.000000Z"
    }
}
        </pre>
      </td>
    </tr>
  </tbody>
</table>