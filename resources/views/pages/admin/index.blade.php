<x-admin.layout_template_admin title="{{ $title }}" mini_title="Home" href="/admin">
    <ul class="box-info">
        <li>
            <i class='bx bxs-calendar-check'></i>
            <span class="text">
                <h3>{{ count($news) }}</h3>
                <p>News upload</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group'></i>
            <span class="text">
                <h3>{{ count($users) }}</h3>
                <p>Users & Author</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-category'></i>
            <span class="text">
                <h3>{{ count($categories) }}</h3>
                <p>Total Categories</p>
            </span>
        </li>
    </ul>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent News</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>category</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <td>
                                <img src="/uploads/news/{{ $news[$i]->image }}">
                                <p>{{ Str::limit($news[$i]->title, 20) }}</p>
                            </td>
                            <td>{{ $news[$i]->created_at->diffForHumans() }}</td>
                            <td><x-elements.badges_category
                                    color="{{ $news[$i]->category->color }}">{{ $news[$i]->category->name }}</x-elements.badges_category>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout_template_admin>
