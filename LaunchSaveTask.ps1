# POWER BY GPT v4

# Importez le module TaskScheduler
#Install-Module TaskScheduler

# Définissez le chemin d'accès complet de votre script PowerShell
$scriptPath = "C:\xampp\htdocs\SaveAutoBDD.ps1"

# Définissez le déclencheur de la tâche pour qu'elle s'exécute toutes les heures
$trigger = New-ScheduledTaskTrigger -Once -At (Get-Date).AddHours(20) -RepetitionInterval (New-TimeSpan -Hour 20) -RepetitionDuration (New-TimeSpan -Hours 23 -Minutes 59 -Seconds 59)

#Supprimer la tâche si elle existe 
Unregister-ScheduledTask -TaskName "SaveTask" -Confirm:$false


# Créez la tâche planifiée
Register-ScheduledTask -TaskName "SaveTask" -Trigger $trigger -Action $action -RunLevel Highest

