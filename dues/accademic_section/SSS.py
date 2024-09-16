from tkinter import*
window=Tk()
window.geometry('600x400')

l1=Label(window,text='name',padx=55,pady=100)
t1=Entry(padx=20,pady=20)
l1.pack()
t1.pack()

window.mainloop()