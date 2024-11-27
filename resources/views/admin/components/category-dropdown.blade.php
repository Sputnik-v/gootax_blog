<div class="">
    <select class="w-56 h-8 bg-gray-100 mt-2 pl-2 border-1 border-gray-200" name="category_id">

        @foreach($categories as $category)

            <option value="{{$category['id']}}">{{$category['category']}}</option>

        @endforeach

    </select>
</div>
