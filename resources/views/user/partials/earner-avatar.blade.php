{{--
    Earner Avatar Partial
    Usage: @include('user.partials.earner-avatar', ['user' => $user, 'class' => 'w-10 h-10 text-sm'])
--}}
@php
    $avatarName = $user->username ?: ($user->name ?: 'User');
    $parts = preg_split('/\s+/', trim($avatarName));
    $first = mb_substr($parts[0] ?? 'U', 0, 1);
    $second = isset($parts[1]) ? mb_substr($parts[1], 0, 1) : (mb_strlen($parts[0] ?? '') > 1 ? mb_substr($parts[0], 1, 1) : '');
    $initials = strtoupper($first . $second);
@endphp
@if(!empty($user->profile_photo_path))
    <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="{{ $avatarName }}"
         class="{{ $class ?? 'w-10 h-10 text-sm' }} rounded-full object-cover bg-surface-overlay ring-2 ring-surface-border shrink-0"
         loading="lazy">
@else
    <div class="{{ $class ?? 'w-10 h-10 text-sm' }} rounded-full bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center font-semibold text-content-inverse ring-2 ring-surface-border shrink-0">
        {{ $initials }}
    </div>
@endif
