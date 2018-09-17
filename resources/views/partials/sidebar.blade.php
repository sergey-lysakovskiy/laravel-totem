<aside class="uk-width-1-6@l uk-margin-bottom">
    <ul class="uk-nav uk-nav-default">
        <li class="{{ str_contains(url()->current(), 'tasks') ? 'uk-active' : '' }}">
            <a href="{{route('totem.tasks.all')}}" class="uk-flex uk-flex-middle">
                <icon name="clock" :scale="100" class="uk-visible@m uk-margin-small-right uk-icon"></icon>
                <span class="uk-vertical-align-middle">Tasks</span>
            </a>
        </li>
        <li class="{{ str_contains(url()->current(), 'tasks') ? 'uk-active' : '' }}">
            <a href="{{route('totem.tasks.all')}}" class="uk-flex uk-flex-middle">
                <icon name="clock" :scale="100" class="uk-visible@m uk-margin-small-right uk-icon"></icon>
                <span class="uk-vertical-align-middle">Tasks</span>
            </a>
        </li>
    </ul>
    <hr>
    <div class="uk-width-1-1@s uk-width-2-3@m">
        <tag-type></tag-type>
    </div>
    <hr>
</aside>