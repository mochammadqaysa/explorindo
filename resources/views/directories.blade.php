<!DOCTYPE html>
<html>
<head>
    <title>File List</title>
</head>
<body>
    <ul>
        @foreach($fileList as $key => $value)
            @if(is_array($value))
                <li>{{ $key }}
                    <ul>
                        @foreach($value as $subFile)
                            @if(is_array($subFile))
                                @foreach($subFile as $subKey => $subValue)
                                    <li>
                                        <a href="{{ Storage::url('tiara/MONEV_KITE_BC_GEDEBAGE_OKTOBER_2024/' . $key . '/' . $subValue) }}">{{ $subValue }}</a>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <a href="{{ Storage::url('tiara/MONEV_KITE_BC_GEDEBAGE_OKTOBER_2024/' . $key . '/' . $subFile) }}">{{ $subFile }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{ Storage::url('tiara/MONEV_KITE_BC_GEDEBAGE_OKTOBER_2024/' . $value) }}">{{ $value }}</a>
                </li>
            @endif
        @endforeach
    </ul>
</body>
</html>
