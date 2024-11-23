## Requirements

- Xampp (8.2.12)
- Composer (2.8.3)
- MySql
- PHP Version (8.2.4)
- Laravel Version (11.33.2)

<br>

## Setup

<ol>
    <li>Setup Xampp (PHP & MySql)</li>
    <li>Setup Composer (Laravel)</li>
    <li>Clone the project from github in folder (C:\xampp\htdocs)</li>
    <li>Create Database with name (books_library)</li>
    <li>Open the command line at the project's directory</li>
    <li>Run the following commands:
        <ul>
            <li>composer install</li>
            <li>php artisan migrate</li>
            <li>php artisan db:seed</li>
            <li>php artisan storage:link</li>
            <li>php artisan serve --port="8000"</li>
        </ul>
    </li>
</ol>



<br>

## API Documentation Link
You have two ways to test API

### Test with import the following link in Postman (Recommended):
[https://api.postman.com/collections/20377479-1505e5d3-2e13-46b8-8cbf-23a7f06bca83?access_key=PMAT-01JDBVYP3JQ1955EP9RQ0VN6KV](https://api.postman.com/collections/20377479-1505e5d3-2e13-46b8-8cbf-23a7f06bca83?access_key=PMAT-01JDBVYP3JQ1955EP9RQ0VN6KV)

<br>

### Test manually:

<strong style='color:red'>baseURL:</strong> 127.0.0.1:8000/api

<strong style='color:red'>End Points</strong>

<table>
    <thead>
        <tr>
            <th>Users can access</th>
            <th>Method</th>
            <th>End Point</th>
            <th>Funcationallity</th>
            <th>Body Data</th>
            <th>Query params</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan=2>Guests</td>
            <td>POST</td>
            <td>/login</td>
            <td>Login the both admin and authors</td>
            <td>
                <ul style="list-style: none;margin: 0;padding: 0">
                    <li>email</li>
                    <li>password</li>
                </ul>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/books/search</td>
            <td>Search about book with title or description</td>
            <td></td>
            <td>searchWord</td>
        </tr>
        <tr>
            <td rowspan=5>Admin</td>
            <td>GET</td>
            <td>/categories</td>
            <td>Get all categories</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/categories</td>
            <td>Add new category</td>
            <td>name</td>
            <td></td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/categories/{category_id}</td>
            <td>Show category</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>PUT / PUSH</td>
            <td>/categories/{category_id}</td>
            <td>Update category</td>
            <td>name</td>
            <td></td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/categories/{category_id}</td>
            <td>Delete category</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td rowspan=5>Admin</td>
            <td>GET</td>
            <td>/authors</td>
            <td>Get all authors</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/authors</td>
            <td>Add new author</td>
            <td>
                <ul style="list-style: none;margin: 0;padding: 0">
                    <li>name</li>
                    <li>email</li>
                    <li>password</li>
                </ul>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/authors/{author_id}</td>
            <td>Show author</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>PUT / PUSH</td>
            <td>/authors/{author_id}</td>
            <td>Update author</td>
            <td>
                <ul style="list-style: none;margin: 0;padding: 0">
                    <li>name</li>
                    <li>email</li>
                    <li>password</li>
                </ul>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/authors/{author_id}</td>
            <td>Delete author</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Admin</td>
            <td>GET</td>
            <td>/admin/books</td>
            <td>Get all books or specific author books</td>
            <td></td>
            <td>
                author_id <span style='color: #ff8400'>(if passed will return author otherwise return all books)</span>
            </td>
        </tr>
        <tr>
            <td rowspan=7>Author</td>
            <td>GET</td>
            <td>/books</td>
            <td>Get all books</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/books</td>
            <td>Add new book</td>
            <td>
                <ul style="list-style: none;margin: 0;padding: 0">
                    <li>title</li>
                    <li style='font-size: 0.95em'>description</li>
                    <li style='font-size: 0.8em'>published_at</li>
                    <li>bio</li>
                    <li>cat_id <span style='color: #ff8400'>(category id)</span></li>
                    <li>cover <span style='color: #ff8400'>(image)</span></li>
                </ul>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/books/{book_id}</td>
            <td>Show book</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/books/{book_id}</td>
            <td>Update book</td>
            <td>
                <ul style="list-style: none;margin: 0;padding: 0">
                    <li>title</li>
                    <li style='font-size: 0.95em'>description</li>
                    <li style='font-size: 0.8em'>published_at</li>
                    <li>bio</li>
                    <li>cat_id <span style='color: #ff8400'>(category id)</span></li>
                    <li>cover <span style='color: #ff8400'>(image)</span></li>
                </ul>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/books/{book_id}</td>
            <td>Delete book</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/author/books/export</td>
            <td>Export all books in excel sheet</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/author/books/import</td>
            <td>Import books from excel sheet</td>
            <td>
                ExcelFile <span style='color: #ff8400'>(Excel sheet)</span>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>


<br>
