import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class GamePanel extends JPanel implements KeyListener, MouseListener {
    private final int TILE_SIZE = 32;
    private final int ROWS = 18;
    private final int COLS = 25;
    private int[][] world = new int[ROWS][COLS];

    private int playerX = 10;
    private int playerY = 5;

    private int selectedBlock = 1;

    public GamePanel() {
        setFocusable(true);
        addKeyListener(this);
        addMouseListener(this);
        generateWorld();
    }

    private void generateWorld() {
        for (int y = 12; y < ROWS; y++) {
            for (int x = 0; x < COLS; x++) {
                world[y][x] = 1; // Tierra
            }
        }
    }

    @Override
    protected void paintComponent(Graphics g) {
        super.paintComponent(g);

        // Dibujar bloques
        for (int y = 0; y < ROWS; y++) {
            for (int x = 0; x < COLS; x++) {
                switch (world[y][x]) {
                    case 1 -> g.setColor(new Color(139, 69, 19)); // Tierra
                    case 2 -> g.setColor(Color.GRAY); // Piedra
                    case 3 -> g.setColor(Color.GREEN); // Césped
                    default -> g.setColor(Color.WHITE);
                }

                if (world[y][x] != 0) {
                    g.fillRect(x * TILE_SIZE, y * TILE_SIZE, TILE_SIZE, TILE_SIZE);
                }

                g.setColor(Color.BLACK);
                g.drawRect(x * TILE_SIZE, y * TILE_SIZE, TILE_SIZE, TILE_SIZE);
            }
        }

        // Dibujar jugador
        g.setColor(Color.BLUE);
        g.fillRect(playerX * TILE_SIZE, playerY * TILE_SIZE, TILE_SIZE, TILE_SIZE);

        // UI - Bloque seleccionado
        g.setColor(Color.BLACK);
        g.drawString("Bloque Seleccionado: " + selectedBlock + " (1=Tierra, 2=Piedra, 3=Césped)", 10, 20);
    }

    @Override
    public void keyPressed(KeyEvent e) {
        switch (e.getKeyCode()) {
            case KeyEvent.VK_W -> playerY = Math.max(0, playerY - 1);
            case KeyEvent.VK_S -> playerY = Math.min(ROWS - 1, playerY + 1);
            case KeyEvent.VK_A -> playerX = Math.max(0, playerX - 1);
            case KeyEvent.VK_D -> playerX = Math.min(COLS - 1, playerX + 1);
            case KeyEvent.VK_1 -> selectedBlock = 1;
            case KeyEvent.VK_2 -> selectedBlock = 2;
            case KeyEvent.VK_3 -> selectedBlock = 3;
        }

        repaint();
    }

    @Override
    public void mouseClicked(MouseEvent e) {
        int x = e.getX() / TILE_SIZE;
        int y = e.getY() / TILE_SIZE;

        if (SwingUtilities.isLeftMouseButton(e)) {
            // Colocar bloque
            world[y][x] = selectedBlock;
        } else if (SwingUtilities.isRightMouseButton(e)) {
            // Quitar bloque
            world[y][x] = 0;
        }

        repaint();
    }

    @Override public void keyReleased(KeyEvent e) {}
    @Override public void keyTyped(KeyEvent e) {}
    @Override public void mousePressed(MouseEvent e) {}
    @Override public void mouseReleased(MouseEvent e) {}
    @Override public void mouseEntered(MouseEvent e) {}
    @Override public void mouseExited(MouseEvent e) {}
}

