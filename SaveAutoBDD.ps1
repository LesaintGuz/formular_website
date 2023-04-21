#What do you want to backup?
$sourceFolder = "C:\xampp\mysql\data"
#Where do you want to backup to?
$destinationFolder = "C:\xampp\htdocs\BDDBackUp"

#Figure out a destination folder with a timestamp.  Store it in a variable so that the same folder name is used throughout the script if it takes over a second to run
$destinationFolderWithTimestamp = ($destinationFolder + "\" + (Get-Date -Format yyyy-mm-dd_HH-mmmm-ss))

#if <destination folder>\<current date and time> doesn't exist - create it!
If (!(Test-Path -Path $destinationFolderWithTimestamp)) {
    New-Item -ItemType Directory -Path $destinationFolderWithTimestamp
    Write-Host ($destinationFolderWithTimestamp + " Created")
}

try {
    #try a backup - stop if it fails
    Copy-Item -Recurse -Path $sourceFolder -Destination $destinationFolderWithTimestamp -ErrorAction Stop -force
    #confirm backup worked
    Write-Host "Backup Completed OK"
    #launch an app - in this case notepad - the "&" needs to be kept as it denotes launching something
    #& C:\Windows\notepad.exe
} catch {
    #Error happened - inform user and do not launch
    Write-Host "Backup Failed - not launching app"
}
