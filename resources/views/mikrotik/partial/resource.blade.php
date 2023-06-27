<script>
    function formatUptime(t) {
        let weeks = 0,
            days = 0,
            hours = 0,
            minutes = 0,
            seconds = 0;

        const weeksIndex = t.indexOf("w");
        const daysIndex = t.indexOf("d");
        const hoursIndex = t.indexOf("h");
        const minutesIndex = t.indexOf("m");
        const secondsIndex = t.indexOf("s");

        if (weeksIndex > -1) {
            weeks = Number(t.substring(0, weeksIndex));
        }

        if (daysIndex > -1) {
            const daysSubstring = t.substring(weeksIndex + 1, daysIndex);
            days = Number(daysSubstring);
        }

        if (hoursIndex > -1) {
            const hoursSubstring = t.substring(daysIndex + 1, hoursIndex);
            hours = Number(hoursSubstring);
        }

        if (minutesIndex > -1) {
            const minutesSubstring = t.substring(hoursIndex + 1, minutesIndex);
            minutes = Number(minutesSubstring);
        }

        if (secondsIndex > -1) {
            const secondsSubstring = t.substring(minutesIndex + 1, secondsIndex);
            seconds = Number(secondsSubstring);
        }

        let uptimeString = "";

        if (weeks > 0) {
            uptimeString += weeks + "w ";
        }

        if (days > 0) {
            uptimeString += days + "d ";
        }

        uptimeString +=
            String(hours).padStart(2, "0") +
            ":" +
            String(minutes).padStart(2, "0") +
            ":" +
            String(seconds).padStart(2, "0");

        return uptimeString;
    }

    function getResourceServer() {
        $.ajax({
            url: linkResource,
            success: function (response) {
                const resource = response.data[0];
                const memoryUse = resource.totalMemory - resource.freeMemory;
                const memoryPercentUse = Math.round(memoryUse / resource.totalMemory * 100);
                const hddUse = resource.totalHdd - resource.freeHdd;
                const hddPercentUse = Math.round(hddUse / resource.totalHdd * 100);
                $('#cpu').css('width', resource.cpuLoad + '%').html(resource.cpuLoad + '%' + 'From' + resource.cpuFrequency + 'Mhz');
                $('#memory').css('width', memoryPercentUse + '%').html(resource.memoryUsage + '/' + resource.totalMemorySpace);
                $('#hdd').css('width', hddPercentUse + '%').html(resource.hddUsage + '/' + resource.totalHddSpace);
                $('#arc').html(resource.arc)
                $('#frequency').html(resource.cpuFrequency)
                $('#rbtype').html(resource.boardName)
                $('#boardname').html(resource.boardName)
                $('#version').html(resource.version)
                $('#uptime').html(formatUptime(resource.uptime))
                $('#cpuCount').html(resource.cpuCount)
            },
            global: false,
            dataType: 'json',
        });
    }
</script>
