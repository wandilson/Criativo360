<div class="px-6 pt-4">
    <div class="my-2">
        <span class="text-sm font-bold">Titulo</span>
        <input type="text" class="w-full border border-gray-100 rounded-lg" name="name" value="{{ $plan->name ?? old('name') }}">
    </div>

    @isset($plan)
        <div class="flex mt-6">
            <label class="flex items-center">
            <input type="checkbox" class="form-checkbox" name="slug" value="1">
            <span class="ml-2">Atualizar Slug?</span>
            </label>
        </div>
    @endisset
    

    <div class="my-2">
        <span class="text-sm font-bold">Slug</span>
        <input type="text" class="w-full border border-gray-100 bg-gray-50 rounded-lg" name="url" value="{{ $plan->url ?? old('url') }}" disabled>
    </div>        
    

    <div class="grid grid-cols-2 mt-6">
        <div class="my-2 w-full">
            <span class="text-sm font-bold block">Preço</span>
            <input type="text" class="w-40 border border-gray-200 rounded-lg bg-gray-100" name="price" value="{{ number_format(@$plan->price, 2, ',', '.') ?? old('price') }}">
        </div>
    </div>
    <div class="my-2">
        <span class="text-sm font-bold">Stripe ID</span>
        <input type="text" class="w-full border border-gray-100 rounded-lg" name="stripe_id" value="{{ $plan->stripe_id ?? old('stripe_id') }}">
    </div>

    <div class="flex mt-6">
        <label class="flex items-center">
          <input type="checkbox" class="form-checkbox" name="recomended" value="1" @if ($plan->recomended == 1)
              checked
          @endif>
          <span class="ml-2">Marcar com Destaque</span>
        </label>
    </div>
    
    <div class="my-2">
        <span class="text-sm font-bold">Texto</span>
        <textarea id="ck-editor" name="description" class="w-full border border-gray-100 rounded-lg" name="" id="" cols="30" rows="5">{{ $plan->description ?? old('description') }}</textarea>
    </div>
</div>