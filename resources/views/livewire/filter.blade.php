<div class="flex flex-col py-10">
  <!-- Show the label of the filter -->
  <label>{{ $label }}</label>

  <!-- Filter -->
  <select wire:model="value" class="border-blue-500"
    x-on:change="
        $wire.label == 'PROPERTY TYPE' && 
        $wire.$parent.filterAmenity( $wire.value )"
    >
    @foreach( $options as $option )
      <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
    @endforeach
  </select>
</div>