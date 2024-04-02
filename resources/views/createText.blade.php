<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Texts</h2>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createModal">
        Create
    </button>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Text</th>
                <th>Author</th>
                <th>Published</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($texts as $text)
            <tr>
                <td>{{ $text->title }}</td>
                <td>{{ $text->text }}</td>
                <td>{{ $text->author }}</td>
                <td>{{ $text->published }}</td>
                <td>{{ $text->slug }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $text->id }}">
                        Edit
                    </button>
                    <form action="{{ url('/text', ['id' => $text->id]) }}" method="post" style="display: inline;">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

            <div class="modal fade" id="editModal{{ $text->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $text->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $text->id }}">Edit Text</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/text', ['id' => $text->id]) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="editTitle">Title</label>
                                    <input type="text" class="form-control" id="editTitle" name="title" value="{{ $text->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="editText">Text</label>
                                    <input type="text" class="form-control" id="editText" name="text" value="{{ $text->text }}">
                                </div>
                                <div class="form-group">
                                    <label for="editTitle">Author</label>
                                    <input type="text" class="form-control" id="editTitle" name="author" value="{{ $text->author }}">
                                </div>
                                <div class="form-group">
                                    <label for="editPublished">Published</label>
                                    <input type="datetime-local" class="form-control" id="editPublished" name="published" value="{{ $text->published }}">
                                </div>

                                <div class="form-group">
                                    <label for="editTitle">Slug</label>
                                    <input type="text" class="form-control" id="editTitle" name="slug" value="{{ $text->slug }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Text</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/text') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="createTitle">Title</label>
                        <input type="text" class="form-control" id="createTitle" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="createText">Text</label>
                        <input type="text" class="form-control" id="createText" name="text" required>
                    </div>
                    <div class="form-group">
                        <label for="createText">Author</label>
                        <input type="text" class="form-control" id="createText" name="author" required>
                    </div>
                    <div class="form-group">
                        <label for="createText">Published</label>
                        <input type="datetime-local" class="form-control" id="createText" name="published" required>
                    </div>
                    <div class="form-group">
                        <label for="createText">Slug</label>
                        <input type="text" class="form-control" id="createText" name="slug" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
