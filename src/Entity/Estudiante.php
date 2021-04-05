<?php

namespace App\Entity;

use App\Repository\EstudianteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstudianteRepository::class)
 */
class Estudiante
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombreEstudiante;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $carnetEstudiante;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $correoEstudiante;

    /**
     * @ORM\ManyToOne(targetEntity=Materia::class, inversedBy="listaEstudiantes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idMateria;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreEstudiante(): ?string
    {
        return $this->nombreEstudiante;
    }

    public function setNombreEstudiante(string $nombreEstudiante): self
    {
        $this->nombreEstudiante = $nombreEstudiante;

        return $this;
    }

    public function getCarnetEstudiante(): ?string
    {
        return $this->carnetEstudiante;
    }

    public function setCarnetEstudiante(string $carnetEstudiante): self
    {
        $this->carnetEstudiante = $carnetEstudiante;

        return $this;
    }

    public function getCorreoEstudiante(): ?string
    {
        return $this->correoEstudiante;
    }

    public function setCorreoEstudiante(?string $correoEstudiante): self
    {
        $this->correoEstudiante = $correoEstudiante;

        return $this;
    }

    public function getIdMateria(): ?Materia
    {
        return $this->idMateria;
    }

    public function setIdMateria(?Materia $idMateria): self
    {
        $this->idMateria = $idMateria;

        return $this;
    }
}
