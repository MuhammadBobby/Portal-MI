<x-layout_template title="{{ $title }}">
    <x-landingPage.jumbotron />
    <x-landingPage.top :top="$topNews" />
    <x-landingPage.parallax />
    <x-landingPage.news :news="$news" />
    <x-landingPage.category />
    <x-landingPage.contact />
</x-layout_template>
