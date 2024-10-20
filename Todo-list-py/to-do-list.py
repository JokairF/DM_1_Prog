class TodoList:
    def __init__(self):
        self.taches = []

    def add_tache(self, tache):
        self.taches.append(tache)
        print(f'tache "{tache}" ajouté.')

    def supprimer_tache(self, tache):
        if tache in self.taches:
            self.taches.remove(tache)
            print(f'tache "{tache}" Supprimer.')
        else:
            print(f'tache "{tache}" pas trouvé.')

    def show_taches(self):
        if not self.taches:
            print("Il n'y a pas de taches.")
        else:
            print("taches:")
            for idx, tache in enumerate(self.taches, start=1):
                print(f"{idx}. {tache}")

if __name__ == "__main__":
    todo_list = TodoList()
    
    while True:
        print("\nOptions:")
        print("1. Ajouter tache")
        print("2. Supprimer tache")
        print("3. Afficher taches")
        print("4. Quitter")
        
        choice = input("Veuillez choisir une option: ")
        
        if choice == '1':
            tache = input("Enter la tache: ")
            todo_list.add_tache(tache)
        elif choice == '2':
            tache = input("Enter la tache à supprimer: ")
            todo_list.supprimer_tache(tache)
        elif choice == '3':
            todo_list.show_taches()
        elif choice == '4':
            print("Exiting...")
            break
        else:
            print("Choix invalide. Veulliez recommencer.")