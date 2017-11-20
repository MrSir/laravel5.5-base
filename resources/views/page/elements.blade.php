@foreach($page->elements()->orderBy('order', 'asc')->get() as $element)
    <?php
    $attributeString = '';

    foreach ($element->elementAttributes as $attribute) {
        $attributeString .= ' ' . $attribute->key . '="' . $attribute->value . '"';
    }
    ?>

    <{{$element->type}}{!! $attributeString !!}>
    {{ $element->content }}
    </{{$element->type}}>
@endforeach